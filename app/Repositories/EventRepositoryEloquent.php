<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EventRepository;
use App\Entities\Event;
use App\Constants\StatusEvent;
use Illuminate\Support\Facades\Log;

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

    public function getFilter(array $filter, $limit = 10)
    {
        $query = $this->model;
        Log::info('Starting filter query', ['filter' => $filter]);

        if (isset($filter['keyword'])) {
            $query = $query->where('name', 'like', '%' . $filter['keyword'] . '%');
            Log::info('Applied keyword filter', ['keyword' => $filter['keyword']]);
        }

        if (isset($filter['category'])) {
            $query = $query->where('event_type_id', $filter['category']);
            Log::info('Applied category filter', ['category' => $filter['category']]);
        }

        if (isset($filter['area'])) {
            $area = strtolower($filter['area']);
            $query = $query->whereRaw('LOWER(location) LIKE ?', ['%' . $area . '%']);
            Log::info('Applied area filter', ['area' => $area]);
        }

        if (isset($filter['status'])) {
            $query = $query->where('status', $filter['status']);
            Log::info('Applied status filter', ['status' => $filter['status']]);
        } else {
            $query = $query->where('status', StatusEvent::ACTIVE);
            Log::info('Applied default status filter', ['status' => StatusEvent::ACTIVE]);
        }

        if (isset($filter['price'])) {
            $query = $query->where('price', $filter['price']);
            Log::info('Applied price filter', ['price' => $filter['price']]);
        }

        if (isset($filter['start_date'])) {
            $query = $query->where('start_date', '>=', $filter['start_date']);
            Log::info('Applied start_date filter', ['start_date' => $filter['start_date']]);
        }

        if (isset($filter['end_date'])) {
            $query = $query->where('end_date', '<=', $filter['end_date']);
            Log::info('Applied end_date filter', ['end_date' => $filter['end_date']]);
        }

        if (isset($filter['sort'])) {
            if ($filter['sort'] === 'newest') {
                $query = $query->orderBy('created_at', 'desc');
                Log::info('Applied newest sort');
            } elseif ($filter['sort'] === 'price') {
                $query = $query->orderBy('price', 'asc');
                Log::info('Applied price sort');
            }
        } else {
            $query = $query->orderBy('created_at', 'desc');
            Log::info('Applied default sort');
        }

        $result = $query->paginate($limit);
        Log::info('Query result', ['count' => $result->count()]);

        return $result;
    }
}
