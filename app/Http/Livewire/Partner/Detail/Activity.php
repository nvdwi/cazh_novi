<?php

namespace App\Http\Livewire\Partner\Detail;

use App\Models\Status;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class Activity extends Component
{
    use WithFileUploads;

    public $modal_id = 'modal-partner-activity';

    public $is_edit = false;

    public $partner;

    public $temp_image;

    public $_id;

    public $statuses = [];

    public $activity_date;

    public $status_id;

    public $notes;

    public $nominal;

    public $images;

    protected $listeners = [
        'set_edit',
        'set_delete',
        'delete',
    ];

    protected $rules = [
        'activity_date' => 'required|date',
        'notes' => 'required|string',
        'nominal' => 'nullable|numeric',
        'status_id' => 'required|integer',
        'images' => 'image|max:1024|nullable', // 1MB Max
    ];

    protected $validationAttributes = [
        'status_id' => 'Status Kunjungan',
        'activity_date' => 'Tanggal Kunjungan',
        'notes' => 'Keterangan',
        'nominal' => 'Nominal',
        'image' => 'Foto',
    ];

    public function mount()
    {
        $this->statuses = Status::get();
        $this->activity_date = now();
    }

    public function render()
    {
        return view('partner.detail.activity');
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
            $activity = \App\Models\Activity::where('id', $id)->delete();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menghapus kategori', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function set_edit($data)
    {
        $this->activity_date = $data['activity_date'];
        $this->status_id = $data['status_id'];
        $this->notes = $data['notes'];
        $this->nominal = floatval($data['nominal']);
        $this->temp_image = $data['images'];
        $this->_id = $data['id'];
        $this->is_edit = true;
        $this->openModal();
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal_id]);
    }

    public function submit()
    {
        $this->validate();
        $this->resetErrorBag();
        try {
            if ($this->images) {
                $fileName = 'activity_image_'.now()->timestamp.'.'.$this->images->extension();
                $this->images->storePubliclyAs('public', $fileName);
            }
            if ($this->is_edit) {
                $partner = \App\Models\Activity::where('id', $this->_id)->update([
                    'activity_date' => $this->activity_date,
                    'status_id' => $this->status_id,
                    'partner_id' => $this->partner->id,
                    'notes' => $this->notes,
                    'nominal' => $this->nominal,
                    'images' => $this->images ? $fileName : $this->temp_image,
                    'created_by' => auth()->user()->id,
                ]);
            } else {
                $partner = \App\Models\Activity::create([
                    'activity_date' => $this->activity_date,
                    'status_id' => $this->status_id,
                    'partner_id' => $this->partner->id,
                    'notes' => $this->notes,
                    'nominal' => $this->nominal,
                    'images' => $this->images ? $fileName : null,
                    'created_by' => auth()->user()->id,
                ]);
            }

            $this->closeModal();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menyimpan aktivitas', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal_id]);
    }
}
