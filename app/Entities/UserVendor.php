<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserVendor.
 *
 * @package namespace App\Entities;
 */
class UserVendor extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_name',
        'phone_number',
        'description',
        'picture',
        'avg_rating',
        'user_id'
    ];

}
