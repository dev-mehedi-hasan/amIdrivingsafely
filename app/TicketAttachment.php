<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class TicketAttachment extends Model
{
    protected $fillable = [
        'ticket_id',
        'video',
        'photo'
   ];

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
