<?php

namespace App\Http\Livewire\Sales;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Index extends Component
{
    public $modal_id = 'modal-sales';

    public $is_edit = false;

    public $_id;

    public $name;

    public $phone;

    public $email;

    public $manager_id;

    public $managers;

    public $password;

    protected $listeners = [
        'set_edit',
        'set_delete',
        'delete',
    ];

    public function mount()
    {
        if(auth()->user()->type == "MANAGER"){
            $this->managers = user::where('id',auth()->user()->id)->get();
        }else{
            $this->managers = User::where('type', 'MANAGER')->get();
        }
    }

    public function render()
    {
        return view('sales.index')->layoutData([
            'title' => 'Sales',
        ]);
    }

    public function submit()
    {
        $this->doValidation();
        $this->resetErrorBag();
        try {
            if ($this->is_edit) {
                $user = User::where('id', $this->_id)->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'manager_id' => $this->manager_id,
                ]);
            } else {
                $user = User::create([
                    'type' => 'SALES',
                    'email_verified_at' => now(),
                    'name' => $this->name,
                    'manager_id' => $this->manager_id,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'password' => Hash::make($this->password),
                ]);
            }
            $this->closeModal();
            $this->reset_field();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menambahkan sales', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function doValidation()
    {
        return Validator::make(
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => $this->password,
                'manager_id' => $this->manager_id,
            ],
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'manager_id' => 'required|integer',
                'password' => $this->is_edit ? 'nullable' : 'required', 'string',
            ],
            [],
            [
                'name' => 'Nama',
                'email' => 'Email',
                'manager_id' => 'Manajer',
                'phone' => 'Nomor HP',
                'password' => 'Password',
            ]
        )->validate();
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal_id]);
    }

    public function reset_field()
    {
        $this->is_edit = false;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->phone = null;
        $this->_id = null;
    }

    public function set_edit($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
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
            $user = User::where('id', $id)->delete();
            $this->emit('re_render_table');
            $this->dispatchBrowserEvent('notification', ['message' => 'Berhasil menghapus sales', 'status' => 'success']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notification', ['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
