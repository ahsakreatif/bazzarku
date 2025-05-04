<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'permit_document',
        'start_date',
        'end_date',
        'price',
        'location',
        'status',
        'is_promoted',
        'event_type_id',
        'user_id'
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

    public function getStartDateAttribute($value)
    {
        return $value ? date('Y-m-d\TH:i', strtotime($value)) : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? date('Y-m-d\TH:i', strtotime($value)) : null;
    }

    public function eventTenants(): HasMany
    {
        return $this->hasMany(EventTenant::class);
    }

    public function getPictureAttribute($value)
    {
        // check if it has http or https
        if (strpos($value, 'http') === 0) {
            return $value;
        }
        return $value ? asset('storage/' . $value) : null;
    }

}
