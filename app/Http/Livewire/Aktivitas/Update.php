<?php

namespace App\Http\Livewire\Aktivitas;

use App\Models\Activity;
use App\Models\Partner;
use App\Models\Status;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $partners = [];

    public $statuses = [];

    public $activity_date;

    public $notes;

    public $nominal = 0;

    public $images;

    public $activity;

    public $status_id;

    public $partner_id;

    protected $rules = [
        'partner_id' => 'required|integer',
        'activity_date' => 'required|date',
        'notes' => 'required|string',
        'nominal' => 'nullable|numeric',
        'status_id' => 'required|integer',
        'images' => 'image|max:1024|nullable', // 1MB Max
    ];

    protected $validationAttributes = [
        'partner_id' => 'Nama Partner',
        'status_id' => 'Status Kunjungan',
        'activity_date' => 'Tanggal Kunjungan',
        'notes' => 'Keterangan',
        'nominal' => 'Nominal',
        'image' => 'Foto',
    ];

    public function mount($id)
    {
        $this->activity = Activity::where('id', $id)->firstOrFail();
        $this->partners = Partner::get();
        $this->statuses = Status::get();

        //data
        $this->nominal = floatval($this->activity->nominal);
        $this->activity_date = $this->activity->activity_date;
        $this->notes = $this->activity->notes;
        $this->status_id = $this->activity->status_id;
        $this->partner_id = $this->activity->partner_id;
    }

    public function render()
    {
        return view('aktivitas.create')->layoutData([
            'title' => 'Edit Aktivitas',
        ]);
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

            $this->activity->update([
                'activity_date' => $this->activity_date,
                'status_id' => $this->status_id,
                'partner_id' => $this->partner_id,
                'notes' => $this->notes,
                'nominal' => $this->nominal,
                'images' => $this->images ? $fileName : $this->activity->images,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menyimpan aktivitas', 'status' => 'success']);
            redirect()->route('aktivitas.index');
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
