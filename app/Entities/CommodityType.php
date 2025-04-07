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

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}
