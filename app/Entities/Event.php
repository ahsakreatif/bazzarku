<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Event.
 *
 * @package namespace App\Entities;
 */
class Event extends Model implements Transformable
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
        'start_date',
        'end_date',
        'event_type_id',
        'user_id',
        'status',
        'price'
    ];

    public function type()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(EventReview::class);
    }

    public function getPictureAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? date('Y-m-d\TH:i', strtotime($value)) : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? date('Y-m-d\TH:i', strtotime($value)) : null;
    }

    public function tenants() {
        return $this->belongsToMany(User::class, 'event_tenants', 'event_id', 'user_id');
    }

}
