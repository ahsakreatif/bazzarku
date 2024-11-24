<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserVendorRepository;
use App\Entities\UserVendor;
use App\Validators\UserVendorValidator;

/**
 * Class UserVendorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserVendorRepositoryEloquent extends BaseRepository implements UserVendorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserVendor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
