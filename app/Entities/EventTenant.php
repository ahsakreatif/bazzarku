<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class EventTenant.
 *
 * @package namespace App\Entities;
 */
class EventTenant extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'tenant_id',
        'status',
        'start_date',
        'end_date',
        'payment_proof',
        'message'
    ];

    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_tenants', 'event_id', 'tenant_id');
    }
}
