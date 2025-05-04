<?php

namespace App\Livewire\Vendor;

use App\Entities\Commodity;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreateCommodity extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $commodityId = null;
    public $name = '';
    public $description = '';
    public $picture;
    public $price = '';
    public $location = '';
    public $commodity_type_id = '';
    public $status = 'active';
    public $oldPicture = null;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'picture' => 'nullable|image|max:2048',
        'price' => 'required|numeric|min:0',
        'commodity_type_id' => 'required|exists:commodity_types,id',
        'location' => 'required',
    ];

    protected $listeners = ['editCommodity' => 'handleEditCommodity'];

    public function mount($commodityId = null)
    {
        $this->commodityId = $commodityId;
        if ($this->commodityId) {
            $this->edit($this->commodityId);
        }
    }

    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);
        $this->commodityId = $id;
        $this->name = $commodity->name;
        $this->description = $commodity->description;
        $this->oldPicture = asset('storage/' . $commodity->picture);
        $this->price = $commodity->price;
        $this->commodity_type_id = $commodity->commodity_type_id;
        $this->location = $commodity->location;
        $this->status = $commodity->status;
        $this->isOpen = true;
    }

    public function handleEditCommodity($id)
    {
        $this->edit($id);
    }

    public function openModal()
    {
        $this->reset(['commodityId', 'name', 'description', 'picture', 'price', 'commodity_type_id', 'location', 'status', 'oldPicture']);
        $this->status = 'active';
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
            'location' => $this->location,
            'commodity_type_id' => $this->commodity_type_id,
            'user_id' => Auth::user()->id,
        ];

        if ($this->picture) {
            $data['picture'] = $this->picture->store('commodities', 'public');
        } elseif ($this->oldPicture) {
            // $data['picture'] = $this->oldPicture;
        }

        if ($this->commodityId) {
            Commodity::find($this->commodityId)->update($data);
            $message = 'Commodity updated successfully';
        } else {
            Commodity::create($data);
            $message = 'Commodity created successfully';
        }

        $this->reset();
        $this->isOpen = false;

        session()->flash('message', $message);
        $this->dispatch('commodity-created');
    }

    public function render()
    {
        return view('livewire.vendor.create-commodity', [
            'commodityTypes' => \App\Entities\CommodityType::all()
        ]);
    }
}
