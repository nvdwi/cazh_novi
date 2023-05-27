<?php

namespace App\Http\Livewire\Setting\Category;

use Exception;
use Livewire\Component;

class Index extends Component
{
    public $_id;

    public $name;

    public $descriptions;

    public $is_edit = false;

    public $modal_id = 'modal-category';

    protected $listeners = [
        'set_edit',
        'set_delete',
        'delete',
    ];

    protected $rules = [
        'name' => 'required|string',
        'descriptions' => 'required|string',
    ];

    protected $validationAttributes = [
        'name' => 'Nama',
        'descriptions' => 'Deskripsi',
    ];

    public function render()
    {
        return view('setting.category.index');
    }

    public function submit()
    {
        $this->validate();
        $this->resetErrorBag();
        try {
            if ($this->is_edit) {
                $category = \App\Models\Category::where('id', $this->_id)->update([
                    'name' => $this->name,
                    'descriptions' => $this->descriptions,
                ]);
            } else {
                $category = \App\Models\Category::create([
                    'name' => $this->name,
                    'descriptions' => $this->descriptions,
                ]);
            }
            $this->closeModal();
            $this->reset_field();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menambahkan kategori', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function reset_field()
    {
        $this->is_edit = false;
        $this->name = null;
        $this->descriptions = null;
        $this->_id = null;
    }

    public function set_edit($data)
    {
        $this->name = $data['name'];
        $this->descriptions = $data['descriptions'];
        $this->_id = $data['id'];
        $this->openModal('edit');
    }

    public function openModal($mode = 'create')
    {
        if ($mode == 'create') {
            $this->is_edit = false;
        } else {
            $this->is_edit = true;
        }
        $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal_id]);
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal_id]);
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

    public function delete($id)
    {
        try {
            $category = \App\Models\Category::where('id', $id)->delete();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menghapus kategori', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
