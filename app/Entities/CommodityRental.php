<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CommodityRental extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'commodity_id',
        'user_id',
        'start_date',
        'end_date',
        'status',
        'payment_proof',
        'message',
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
