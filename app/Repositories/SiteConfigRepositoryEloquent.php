<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SiteConfigRepository;
use App\Entities\SiteConfig;
use App\Validators\SiteConfigValidator;

/**
 * Class SiteConfigRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SiteConfigRepositoryEloquent extends BaseRepository implements SiteConfigRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SiteConfig::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
