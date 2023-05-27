<?php

namespace App\Http\Livewire\Partner;

use App\Models\Category;
use App\Models\Partner;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $categories = [];

    public $name;

    public $category_id;

    public $address;

    public $pic;

    public $pic_phone;

    public $images;

    public $modal_id = 'modal-partner';

    protected $listeners = [
        'set_delete',
        'delete',
    ];

    protected $rules = [
        'name' => 'required|string',
        'category_id' => 'required|string',
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

    public function render()
    {
        return view('partner.index')->layoutData([
            'title' => 'Partner',
        ]);
    }

    public function mount()
    {
        $this->categories = Category::get();
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal_id]);
    }

    public function set_delete($data)
    {
        $this->dispatchBrowserEvent('swal:delete', [
            'action' => 'delete',
            'type' => 'warning',
            'text' => 'Apakah kamu yakin akan menghapus "'.$data['name'].'" ?',
            'id' => $data['id'],
        ]);
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
            $partner = Partner::create([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'address' => $this->address,
                'pic' => $this->pic,
                'pic_phone' => $this->pic_phone,
                'images' => $this->images ? $fileName : null,
                'created_by' => auth()->user()->id,
            ]);

            $this->closeModal();
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menambahkan kategori', 'status' => 'success']);
            redirect()->route('partner.detail', ['id' => $partner->id]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal_id]);
    }

    public function reset_field()
    {
        $this->name = null;
        $this->category_id = null;
        $this->address = null;
        $this->pic = null;
        $this->pic_phone = null;
        $this->image = null;
    }

    public function delete($id)
    {
        try {
            $partner = Partner::where('id', $id)->delete();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menghapus kategori', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
