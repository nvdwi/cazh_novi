<?php

namespace App\Http\Livewire\Aktivitas;

use App\Models\Activity;
use Exception;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'set_delete',
        'delete',
    ];

    public function render()
    {
        return view('aktivitas.index')->layoutData([
            'title' => 'Aktivitas',
        ]);
    }

    public function set_delete($data)
    {
        $this->dispatchBrowserEvent('swal:delete', [
            'action' => 'delete',
            'type' => 'warning',
            'text' => 'Apakah kamu yakin akan menghapus aktivitas ini ?',
            'id' => $data['id'],
        ]);
    }

    public function delete($id)
    {
        try {
            $activity = Activity::where('id', $id)->delete();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menghapus kategori', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
