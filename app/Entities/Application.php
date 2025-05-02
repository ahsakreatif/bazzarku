<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'note',
        'event_id',
        'status',
        'payment_proof',
        'payment_datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
