<?php

namespace App\Exports;

use App\Ticket;
use App\TicketAttachment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ticket::all();
    }

    public function map($ticket): array
    {
        // if(!is_null($ticket->Attachments)){
        //     foreach ($ticket->Attachments as $key => $attachment) {
        //         if(!is_null($attachment->photo)){
        //             $ticket_photo = env('APP_URL').'/public/'.$attachment->photo;
        //         }
        //         else{
        //             $ticket_photo = null;
        //         }
        //         if(!is_null($attachment->video)){
        //             $ticket_video = env('APP_URL').'/public/'.$attachment->video;
        //         }
        //         else{
        //             $ticket_video = null;
        //         }
        //     }
        // }

        // $created_at = Carbon::parse($ticket->created_at)->format('d-M-Y g:i A');
        // $updated_at = Carbon::parse($ticket->updated_at)->format('d-M-Y g:i A');

        // if(!is_null($ticket->created_by)){
        //     $created_by = $ticket->CreatedBy->name;
        //     foreach($ticket->CreatedBy->getRoleNames() as $role)
        //     {
        //         $user_role = $role;        
        //     }
        // }
        // elseif(!is_null($ticket->external_created_by)){
        //     $created_by = $ticket->external_created_by;
        //     $user_role = 'Agent';
        // }
        // else{
        //     $created_by = null;
        // }
        // return [
        //     $ticket->id,
        //     $ticket->name,
        //     $ticket->external_phone_number,
        //     $created_by,
        //     $user_role,
        //     $created_at,
        //     $ticket->UpdatedBy->name,
        //     $updated_at,
        //     $ticket->incident_type,
        //     $ticket->type_of_vehicle,
        //     $ticket->vehicle_number,
        //     $ticket->location_of_incident,
        //     $ticket->sticker,
        //     $ticket->comment_recommendation,
        //     $ticket->remarks,
        //     $ticket->status,
        //     1,
        //     1,
        // ];
        return [
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
        ];
    }

    public function headings(): array
    {
        return [
            'Ticket Number',
            'complainant Name',
            'complainant Number',
            'Created By',
            'User Role',
            'Create at',
            'Updated By',
            'Update At',
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
    }
}
