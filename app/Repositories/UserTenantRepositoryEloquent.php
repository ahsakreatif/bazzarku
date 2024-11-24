<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserTenantRepository;
use App\Entities\UserTenant;
use App\Validators\UserTenantValidator;

/**
 * Class UserTenantRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserTenantRepositoryEloquent extends BaseRepository implements UserTenantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserTenant::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
