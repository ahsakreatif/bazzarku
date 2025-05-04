<?php

namespace App\Livewire\Components;

use App\Entities\Commodity;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;
use App\Entities\UserVendor;
use App\Constants\Event as EventConstant;

class CommodityList extends Component
{
    use WithPagination;

    public $vendor;
    public $user;
    public $limit = EventConstant::LIMIT;
    public $title = 'Available Rental Items';
    public $gridCols = 'grid-cols-1 md:grid-cols-3';
    public $showDescription = false;
    public $showPrice = true;
    public $showLocation = true;
    public $showViewButton = false;

    public function mount(UserVendor $vendor = null)
    {
        if (!empty($vendor)) {
            $this->vendor = $vendor;
            $this->user = $vendor->user;
        }
    }

    public function render()
    {
        $query = Commodity::where('status', 'available');

        if ($this->user) {
            $query->where('user_id', $this->user->id);
        }

        $commodities = $query
            ->orderBy('created_at', 'desc')
            ->paginate($this->limit);

        foreach ($commodities as &$commodity) {
            if ($commodity->picture && !str_starts_with($commodity->picture, 'http')) {
                $commodity->picture = url($commodity->picture);
            }
        }

        return view('livewire.components.commodity-list', [
            'commodities' => $commodities
        ]);
    }
}
