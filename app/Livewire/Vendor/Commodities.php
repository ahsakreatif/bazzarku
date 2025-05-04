<?php

namespace App\Livewire\Vendor;

use App\Entities\Commodity;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Commodities extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $perPage = 12;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    protected $listeners = ['commodity-created' => '$refresh'];

    public function updatedSearch($value)
    {
        Log::info('Commodity search updated to: ' . $value);
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->resetPage();
    }

    public function edit($id)
    {
        $this->dispatch('editCommodity', id: $id)->to('vendor.create-commodity');
    }

    public function render()
    {
        try {
            if (!Auth::check() || !Auth::user()->vendor) {
                return view('livewire.vendor.commodities', [
                    'commodities' => collect([])
                ]);
            }

            $query = Commodity::query()
                ->where('user_id', Auth::user()->id);

            if ($this->search) {
                Log::info('Applying commodity search filter: ' . $this->search);
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            }

            if ($this->status) {
                $query->where('status', $this->status);
            }

            $commodities = $query->orderBy('created_at', 'desc')
                            ->paginate($this->perPage);

            return view('livewire.vendor.commodities', [
                'commodities' => $commodities
            ]);

        } catch (\Exception $e) {
            Log::error('Commodities component error: ' . $e->getMessage());
            return view('livewire.vendor.commodities', [
                'commodities' => collect([])
            ]);
        }
    }
}
