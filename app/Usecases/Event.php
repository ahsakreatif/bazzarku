<?php

namespace App\Usecases;

use App\Repositories\EventRepository;

class Event
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function all()
    {
        return $this->eventRepository->all();
    }

    public function create($data)
    {
        return $this->eventRepository->create($data);
    }

    public function update($data, $id)
    {
        return $this->eventRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->eventRepository->delete($id);
    }

    public function find($id)
    {
        return $this->eventRepository->find($id);
    }
}
