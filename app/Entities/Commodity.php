<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Commodity extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'picture',
        'price',
        'status',
        'commodity_type_id',
        'user_id',
    ];

    public function type()
    {
        return $this->belongsTo(CommodityType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
