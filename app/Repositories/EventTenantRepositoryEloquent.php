<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EventTenantRepository;
use App\Entities\EventTenant;
use App\Validators\EventTenantValidator;

/**
 * Class EventTenantRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EventTenantRepositoryEloquent extends BaseRepository implements EventTenantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EventTenant::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
