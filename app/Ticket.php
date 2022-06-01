<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Ticket extends Model
{
    protected $fillable = [
         'name',
         'location_of_incident',
         'vehicle_number',
         'incident_type',
         'comment_recommendation',
         'sticker',
         'type_of_vehicle',
         'issue_type',
         'issue_description',
         'status',
         'remarks',
         'created_at',
         'created_by',
         'updated_at',
         'updated_by',
         'external_phone_number',
         'external_created_by'
    ];

    public function CreatedBy()
    {
        return $this->belongsTo('App\User','created_by');
    }
    public function UpdatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
    public function Attachments() {
        return $this->hasMany(TicketAttachment::class);
    }
}
