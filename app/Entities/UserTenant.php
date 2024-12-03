<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserTenant.
 *
 * @package namespace App\Entities;
 */
class UserTenant extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenant_name',
        'phone_number',
        'address',
        'city',
        'picture',
        'profile',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPictureAttribute($value)
    {
        if (strpos($value, 'http') === 0) {
            return $value;
        }
        return $value ? asset('storage/' . $value) : null;
    }
}
