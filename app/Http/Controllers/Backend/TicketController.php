<?php

namespace App\Http\Controllers\Backend;

use App\Ticket;
use App\TicketAttachment;
use App\IncidentType;
use App\Exports\TicketsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehicleType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Mail;
use App\Mail\NewTicketMail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dateConvert($daterangepicker){
        $y_m_d = explode('/',$daterangepicker);
        $y_m_d = $y_m_d[2].'-'.$y_m_d[0].'-'.$y_m_d[1];
        return $y_m_d;
    }
    public function index(Request $request)
    {
        $tickets = Ticket::whereNotNull('created_at');
        if($request->has('daterangepicker') && $request->daterangepicker != null){
            $daterangepicker = explode(' - ',$request->daterangepicker);
            $startdate = $this->dateConvert($daterangepicker[0]).' 00:00:00';
            $enddate = $this->dateConvert($daterangepicker[1]).' 23:59:59';
            $tickets = $tickets->whereBetween('created_at', [$startdate, $enddate]);
        }
        if($request->has('status') && $request->status != null && $request->status != 'all'){
            $tickets = $tickets->where('status', $request->status);
        }
        $tickets = $tickets->get();
        return view('backend.pages.ticket-management.tickets.ticket-list', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incident_types =  IncidentType::latest()->get();
        $vehicle_types =  VehicleType::latest()->get();
        return view('backend.pages.ticket-management.tickets.add-new', compact('incident_types', 'vehicle_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('attachments') && $request->attachments != null) {
            request()->validate([
                'attachments' => 'present|array',
                'attachments.*' => 'mimes:mp4,webm,mpg,avi,mov,flv,wmv,jpg,jpeg,png,gif,svg|max:30720 ',
            ]);
        }
        $lastticket = Ticket::latest()->first();
        if ($lastticket == null) {
            Schema::disableForeignKeyConstraints();
            Ticket::truncate();
            TicketAttachment::truncate();
            Schema::enableForeignKeyConstraints();
        }
        $ticket = new Ticket();
        $ticket->created_by = Auth::id();
        $ticket->save();
        if ($request->has('attachments') && $request->attachments != null) {
            for ($i = 0; $i < sizeof($request->attachments); $i++) {
                $ticketattachment = new TicketAttachment();
                if ($ticket != null) {
                    $ticketattachment->ticket_id = $ticket->id;
                    $prefix = "DS" . '-' . $ticket->id . '-' . $i;
                }
                $extension = $request->attachments[$i]->extension();
                if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'svg') {
                    $fileName = $prefix . '.' . $extension;
                    $request->attachments[$i]->move(public_path('tickets/photo/' . $ticket->id . '/'), $fileName);
                    $ticketattachment->photo = 'tickets/photo/' . $ticket->id . '/' . $fileName;
                } elseif ($extension == 'mp4' || $extension == 'webm' || $extension == 'mpg' || $extension == 'avi' || $extension == 'mov' || $extension == 'flv' || $extension == 'wmv') {
                    $fileName = $prefix . '.' . $extension;
                    $request->attachments[$i]->move(public_path('tickets/video/' . $ticket->id . '/'), $fileName);
                    $ticketattachment->video = 'tickets/video/' . $ticket->id . '/' . $fileName;
                }
                $ticketattachment->save();
            }
        }
        $ticket->name = $request->name;
        $ticket->location_of_incident = $request->location_of_incident;
        $ticket->vehicle_number = $request->vehicle_number;
        $ticket->incident_type = $request->incident_type;
        $ticket->comment_recommendation = $request->comment_recommendation;
        $ticket->sticker = $request->sticker;
        $ticket->type_of_vehicle = $request->type_of_vehicle;
        $ticket->status = "pending";
        if ($request->has('external_phone_number') && $request->external_phone_number != null) {
            $ticket->external_phone_number = $request->external_phone_number;
        }
        if ($request->has('external_created_by') && $request->external_created_by != null) {
            $ticket->external_created_by = $request->external_created_by;
        }
        $ticket->save();

        if ($ticket->save()) {
            if (Auth::id() != null) {
                $created_by = auth()->user()->name;
                foreach (Auth::user()->getRoleNames() as $role) {
                    $user_Type = $role;
                }
            } else {
                $created_by = $request->external_created_by;
                $user_Type = 'Agent';
            }

            $details = [
                'ticket_id' => $ticket->id,
                'created_by' => $created_by,
                'user_Type' => $user_Type,
                'created_at' => Carbon::parse(Carbon::now())->format('d-M-Y g:i A'),
                'complainant_name' => $request->name,
                'complainant_number' => $request->external_phone_number,
                'location_of_incident' => $request->location_of_incident,
                'vehicle_number' => $request->vehicle_number,
                'incident_type' => $request->incident_type,
                'comment_recommendation' => $request->comment_recommendation,
                'sticker' => $request->sticker,
                'type_of_vehicle' => $request->type_of_vehicle,
                'attachment_size' => sizeof($request->attachments),
            ];

            Mail::to('kazi.mohiuddin@mgi.org')->send(new NewTicketMail($details));

            return redirect()->back()->with('ticket-create-success', 'Ticket has been created successfully');
        } else {
            return redirect()->back()->with('ticket-create-failed', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket =  Ticket::findOrFail($id);
        $ticketattachment = TicketAttachment::where('ticket_id', $id)->get();
        $ticketattachment_video = TicketAttachment::where('ticket_id', $id)->whereNotNull('video')->get();
        $ticketattachment_photo = TicketAttachment::where('ticket_id', $id)->whereNotNull('photo')->get();
        return view('backend.pages.ticket-management.tickets.ticket-show', compact('ticket', 'ticketattachment', 'ticketattachment_video', 'ticketattachment_photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $incident_types =  IncidentType::latest()->get();
        $vehicle_types =  VehicleType::latest()->get();
        $ticketattachment = TicketAttachment::where('ticket_id', $id)->get();
        $ticketattachment_video = TicketAttachment::where('ticket_id', $id)->whereNotNull('video')->get();
        $ticketattachment_photo = TicketAttachment::where('ticket_id', $id)->whereNotNull('photo')->get();
        return view('backend.pages.ticket-management.tickets.ticket-edit', compact('ticket', 'incident_types', 'vehicle_types', 'ticketattachment', 'ticketattachment_video', 'ticketattachment_photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('attachments') && $request->attachment != null) {
            request()->validate([
                'attachments' => 'present|array',
                'attachments.*' => 'mimes:mp4,webm,mpg,avi,mov,flv,wmv,jpg,jpeg,png,gif,svg|max:30720 ',
            ]);
        }
        $ticket = Ticket::findOrFail($id);
        if ($request->has('name') && !is_null($request->name)) {
            $ticket->name = $request->name;
        }
        if ($request->has('location_of_incident') && !is_null($request->location_of_incident)) {
            $ticket->location_of_incident = $request->location_of_incident;
        }
        if ($request->has('vehicle_number') && !is_null($request->vehicle_number)) {
            $ticket->vehicle_number = $request->vehicle_number;
        }
        if ($request->has('incident_type') && !is_null($request->incident_type)) {
            $ticket->incident_type = $request->incident_type;
        }
        if ($request->has('comment_recommendation') && !is_null($request->comment_recommendation)) {
            $ticket->comment_recommendation = $request->comment_recommendation;
        }
        if ($request->has('sticker') && !is_null($request->sticker)) {
            $ticket->sticker = $request->sticker;
        }
        if ($request->has('type_of_vehicle') && !is_null($request->type_of_vehicle)) {
            $ticket->type_of_vehicle = $request->type_of_vehicle;
        }
        if ($request->has('attachments') && $request->attachments != null) {
            $ticketattachment = TicketAttachment::where('ticket_id', $id)->latest()->first();
            $str = $ticketattachment->photo;
            $last_attachment_serial = preg_match('~DS-' . $ticket->id . '-\K\d+~', $str, $out) ? $out[0] : 'no match';
            for ($i = 0; $i < sizeof($request->attachments); $i++) {
                $ticketattachment = new TicketAttachment();
                if ($ticket != null) {
                    $ticketattachment->ticket_id = $ticket->id;
                    $prefix = "DS" . '-' . $ticket->id . '-' . ($last_attachment_serial + $i + 1);
                }
                $extension = $request->attachments[$i]->extension();
                if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'svg') {
                    $fileName = $prefix . '.' . $extension;
                    $request->attachments[$i]->move(public_path('tickets/photo/' . $ticket->id . '/'), $fileName);
                    $ticketattachment->photo = 'tickets/photo/' . $ticket->id . '/' . $fileName;
                } elseif ($extension == 'mp4' || $extension == 'webm' || $extension == 'mpg' || $extension == 'avi' || $extension == 'mov' || $extension == 'flv' || $extension == 'wmv') {
                    $fileName = $prefix . '.' . $extension;
                    $request->attachments[$i]->move(public_path('tickets/video/' . $ticket->id . '/'), $fileName);
                    $ticketattachment->video = 'tickets/video/' . $ticket->id . '/' . $fileName;
                }
                $ticketattachment->save();
            }
        }
        if ($request->has('status') && $request->status != null) {
            $ticket->status = $request->status;
        }
        if ($request->has('remarks') && $request->remarks != null) {
            $ticket->remarks = $request->remarks;
        }
        $ticket->updated_at = Carbon::now();
        $ticket->updated_by = Auth::id();
        if ($ticket->save()) {
            return redirect()->back()->with('ticket-update-success', 'Ticket has been updated successfully');
        } else {
            return redirect()->back()->with('ticket-update-failed', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        if ($ticket->Attachments != null) {
            foreach ($ticket->Attachments as $ticketattachment) {
                if ($ticketattachment->photo != null) {
                    File::delete(public_path($ticketattachment->photo));
                }
                if ($ticketattachment->video != null) {
                    File::delete(public_path($ticketattachment->video));
                }
            }
            File::deleteDirectory(public_path('tickets/photo/' . $ticket->id));
            File::deleteDirectory(public_path('tickets/video/' . $ticket->id));
        }
        if ($ticket->delete()) {
            return redirect()->back()->with('ticket-delete-success', 'Ticket has been deleted successfully');
        } else {
            return redirect()->back()->with('ticket-delete-failed', 'Something went wrong');
        }
    }

    public function create_remote()
    {
        $tickets = Ticket::latest()->get();
        $incident_types =  IncidentType::latest()->get();
        $vehicle_types =  VehicleType::latest()->get();
        return view('backend.pages.ticket-management.tickets.add-new-remote', compact('tickets', 'incident_types', 'vehicle_types'));
    }

    public function export(Request $request)
    {
        $tickets = Ticket::whereNotNull('created_at');
        if($request->start_date != 'null' && $request->end_date != 'null'){
            $tickets = $tickets->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        if($request->status != 'null' && $request->status != 'all'){
            $tickets = $tickets->where('status', $request->status);
        }
        $tickets = $tickets->get();
        $fileName = 'tickets.csv';
        return $this->getCSV($tickets, $fileName);
    }


    public function getCSV($tickets = [], $fileName)
    {
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = [
            'Ticket Number',
            'Complainant Name',
            'Complainant Number',
            'Created By',
            'User Role',
            'Created at',
            'Updated By',
            'Updated At',
            'Incident Type',
            'Vehicle Type',
            'Vehicle Number',
            'Location of Incident',
            'Sticker',
            'CommentRecommendation',
            'Remarks',
            'Status',
            'Photos',
            'Videos',
        ];

        $callback = function () use ($tickets, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($tickets as $ticket) {
                if(!is_null($ticket->Attachments)){
                    foreach ($ticket->Attachments as $key => $attachment) {
                        if(!is_null($attachment->photo)){
                            $ticket_photo = env('APP_URL').'/public/'.$attachment->photo;
                        }
                        else{
                            $ticket_photo = null;
                        }
                        if(!is_null($attachment->video)){
                            $ticket_video = env('APP_URL').'/public/'.$attachment->video;
                        }
                        else{
                            $ticket_video = null;
                        }
                    }
                }

                if(!is_null($ticket->created_by)){
                    $created_by = $ticket->CreatedBy->name;
                    foreach($ticket->CreatedBy->getRoleNames() as $role)
                    {
                        $user_role = $role;        
                    }
                }
                elseif(!is_null($ticket->external_created_by)){
                    $created_by = $ticket->external_created_by;
                    $user_role = 'Agent';
                }
                else{
                    $created_by = null;
                    $user_role = null;
                }
                fputcsv($file, array(
                    $row['id'] = $ticket->id,
                    $row['complainant_name'] = $ticket->name,
                    $row['complainant_number'] = $ticket->external_phone_number,
                    $row['created_by'] = $created_by,
                    $row['user_role'] = $user_role,
                    $row['created_at'] = Carbon::parse($ticket->created_at)->format('d-M-Y g:i A'),
                    $row['updated_by'] = $ticket->UpdatedBy->name,
                    $row['updated_at'] = Carbon::parse($ticket->updated_at)->format('d-M-Y g:i A'),
                    $row['incident_type'] = $ticket->incident_type,
                    $row['vehicle_type'] = $ticket->type_of_vehicle,
                    $row['vehicle_number'] = $ticket->vehicle_number,
                    $row['location_of_incident'] = $ticket->location_of_incident,
                    $row['sticker'] = $ticket->sticker,
                    $row['commentrecommendation'] = $ticket->comment_recommendation,
                    $row['remarks'] = $ticket->remarks,
                    $row['status'] = $ticket->status,
                    $row['photos'] = $ticket_photo,
                    $row['videos'] = $ticket_video,
                ));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
