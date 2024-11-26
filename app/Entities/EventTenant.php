<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(UserTenant::class, 'tenant_id', 'id');
    }
}
