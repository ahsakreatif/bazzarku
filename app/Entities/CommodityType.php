<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CommodityType extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'slug',
        'picture',
    ];

    public function getPictureAttribute($value)
    {
        // if already has http, return the value
        if (strpos($value, 'http') !== false) {
            return $value;
        }

        return asset('storage/' . $value);
    }

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}
