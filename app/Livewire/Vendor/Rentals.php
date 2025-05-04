<?php

namespace App\Livewire\Vendor;

use App\Entities\Rental;
use App\Entities\Commodity;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Rentals extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $commodity_id = '';
    public $perPage = 12;
    public $selectedRental = null;
    public $viewDetails = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'commodity_id' => ['except' => ''],
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function updatedCommodityId()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->commodity_id = '';
        $this->resetPage();
    }

    public function viewRental($id)
    {
        $this->selectedRental = Rental::find($id);
        $this->viewDetails = true;
    }

    public function closeDetails()
    {
        $this->viewDetails = false;
        $this->selectedRental = null;
    }

    public function updateStatus($id, $status)
    {
        $rental = Rental::find($id);
        $rental->status = $status;
        $rental->save();

        if ($this->selectedRental && $this->selectedRental->id === $id) {
            $this->selectedRental = $rental;
        }

        session()->flash('message', 'Rental status updated successfully.');
    }

    public function render()
    {
        try {
            if (!Auth::check() || !Auth::user()->vendor) {
                return view('livewire.vendor.rentals', [
                    'rentals' => collect([]),
                    'commodities' => collect([])
                ]);
            }

            $vendorId = Auth::user()->id;

            // Get all commodities belonging to this vendor for the filter dropdown
            $commodities = Commodity::where('user_id', $vendorId)->get();

            // Find rentals for commodities owned by this vendor
            $query = Rental::whereHas('commodity', function($q) use ($vendorId) {
                $q->where('user_id', $vendorId);
            });

            if ($this->search) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            }

            if ($this->status) {
                $query->where('status', $this->status);
            }

            if ($this->commodity_id) {
                $query->where('commodity_id', $this->commodity_id);
            }

            $rentals = $query->orderBy('created_at', 'desc')
                            ->paginate($this->perPage);

            return view('livewire.vendor.rentals', [
                'rentals' => $rentals,
                'commodities' => $commodities
            ]);
        } catch (\Exception $e) {
            Log::error('Rentals component error: ' . $e->getMessage());
            return view('livewire.vendor.rentals', [
                'rentals' => collect([]),
                'commodities' => collect([])
            ]);
        }
    }
}
