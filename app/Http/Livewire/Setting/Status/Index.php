<?php

namespace App\Http\Livewire\Setting\Status;

use App\Models\Status;
use Exception;
use Livewire\Component;

class Index extends Component
{
    public $_id;

    public $name;

    public $is_edit = false;

    public $modal_id = 'modal-status';

    protected $listeners = [
        'set_edit',
        'set_delete',
        'delete',
    ];

    protected $rules = [
        'name' => 'required|string',
    ];

    protected $validationAttributes = [
        'name' => 'Nama',
    ];

    public function render()
    {
        return view('setting.status.index');
    }

    public function submit()
    {
        $this->validate();
        $this->resetErrorBag();
        try {
            if ($this->is_edit) {
                $status = Status::where('id', $this->_id)->update([
                    'name' => $this->name,
                ]);
            } else {
                $status = Status::create([
                    'name' => $this->name,
                ]);
            }
            $this->closeModal();
            $this->reset_field();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menyimpan status kunjungan', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function reset_field()
    {
        $this->is_edit = false;
        $this->name = null;
        $this->_id = null;
    }

    public function set_edit($data)
    {
        $this->name = $data['name'];
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
            $status = Status::where('id', $id)->delete();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menghapus status kunjungan', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
