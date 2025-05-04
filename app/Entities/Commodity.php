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
        'location',
        'commodity_type_id',
        'user_id',
    ];

    public function getPictureAttribute($value)
    {
        // if already has http, return the value
        if (strpos($value, 'http') !== false) {
            return $value;
        }

        return asset('storage/' . $value);
    }

    public function type()
    {
        return $this->belongsTo(CommodityType::class, 'commodity_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
