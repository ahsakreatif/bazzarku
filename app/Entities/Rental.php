<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'note',
        'commodity_id',
        'status',
        'payment_proof',
        'payment_datetime',
        'start_date',
        'end_date',
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

}
