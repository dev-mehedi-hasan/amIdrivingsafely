<?php

namespace App\Http\Controllers\Backend;

use App\Ticket;
Use \Carbon\Carbon;
use App\TicketAttachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class TicketAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticketattachment = TicketAttachment::findOrFail($id);
        if($ticketattachment != null){
                if($ticketattachment->photo != null){
                    File::delete(public_path($ticketattachment->photo));
                }
                if($ticketattachment->video != null){
                    File::delete(public_path($ticketattachment->video));
                }
        }
        $ticketattachment_photo = TicketAttachment::where('ticket_id', $ticketattachment->ticket_id)->whereNotNull('photo')->get();
        $ticketattachment_video = TicketAttachment::where('ticket_id', $ticketattachment->ticket_id)->whereNotNull('video')->get();
        if(count($ticketattachment_photo) < 1){
            File::deleteDirectory(public_path('tickets/photo/'.$ticketattachment->ticket_id));
        }
        if(count($ticketattachment_video) < 1){
            File::deleteDirectory(public_path('tickets/video/'.$ticketattachment->ticket_id));
        }
        if($ticketattachment->delete()){
            return redirect()->back()->with('ticket-attachment-delete-success', 'An attachement of this ticket has been deleted successfully');
        }
        else{
            return redirect()->back()->with('ticket-attachment-delete-failed', 'Something went wrong');
        }
    }
}
