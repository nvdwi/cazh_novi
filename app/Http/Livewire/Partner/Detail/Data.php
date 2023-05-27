<?php

namespace App\Http\Livewire\Partner\Detail;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Data extends Component
{
    use WithFileUploads;

    public $partner;

    public $categories = [];

    public $name;

    public $category_id;

    public $address;

    public $pic;

    public $pic_phone;

    public $images;

    protected $rules = [
        'name' => 'required|string',
        'category_id' => 'required|integer',
        'address' => 'required|string',
        'pic_phone' => 'required|string',
        'pic' => 'required|string',
        'images' => 'image|max:1024|nullable', // 1MB Max
    ];

    protected $validationAttributes = [
        'name' => 'Nama',
        'category_id' => 'Kategori',
        'address' => 'Alamat',
        'pic_phone' => 'Nomor HP PIC',
        'pic' => 'Nama PIC',
        'image' => 'Foto',
    ];

    public function mount()
    {
        $this->categories = Category::get();
        $this->name = $this->partner->name;
        $this->category_id = $this->partner->category_id;
        $this->address = $this->partner->address;
        $this->pic = $this->partner->pic;
        $this->pic_phone = $this->partner->pic_phone;
    }

    public function render()
    {
        return view('partner.detail.data');
    }

    public function submit()
    {
        $this->validate();
        $this->resetErrorBag();
        try {
            if ($this->images) {
                $fileName = 'partner_image_'.now()->timestamp.'.'.$this->images->extension();
                $this->images->storePubliclyAs('public', $fileName);
            }
            $partner = $this->partner->update([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'address' => $this->address,
                'pic' => $this->pic,
                'pic_phone' => $this->pic_phone,
                'images' => $this->images ? $fileName : $this->partner->images,
            ]);

            $this->emit('refresh');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menyimpan data partner', 'status' => 'success']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
