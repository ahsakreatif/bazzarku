<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class EventType.
 *
 * @package namespace App\Entities;
 */
class EventType extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
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

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
