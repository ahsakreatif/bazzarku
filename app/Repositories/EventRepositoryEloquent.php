<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EventRepository;
use App\Entities\Event;
use App\Constants\StatusEvent;

/**
 * Class EventRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EventRepositoryEloquent extends BaseRepository implements EventRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Event::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getLastEvents($limit = 10)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($limit);
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function getFilter(array $filter)
    {
        $query = $this->model;

        if (isset($filter['keyword'])) {
            $query = $query->where('name', 'like', '%' . $filter['keyword'] . '%');
        }

        if (isset($filter['event_type_id'])) {
            $query = $query->where('event_type_id', $filter['event_type_id']);
        }

        if (isset($filter['status'])) {
            $query = $query->where('status', $filter['status']);
        } else {
            $query = $query->where('status', StatusEvent::ACTIVE);
        }

        if (isset($filter['price'])) {
            $query = $query->where('price', $filter['price']);
        }

        if (isset($filter['start_date'])) {
            $query = $query->where('start_date', '>=', $filter['start_date']);
        }

        if (isset($filter['end_date'])) {
            $query = $query->where('end_date', '<=', $filter['end_date']);
        }

        if (isset($filter['order_at'])) {
            $query = $query->orderBy($filter['order_at'], $filter['order_by']);
        }

        $limit = $filter['limit'] ?? 10;
        $offset = $filter['offset'] ?? 0;

        return $query->take($limit)->skip($offset)->get();
    }
}
