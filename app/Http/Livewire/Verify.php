<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Verify extends Component
{
    public $title;
    public $userModal = false;
    public $deleteUserModalConfirm = false;
    public $form = [];

    protected $listeners = [
        'userModal' => 'openUserModal',
        'deleteUserModal' => 'openDeleteUserModal',
    ];

    public function openUserModal($id)
    {
        $user = User::find($id);
        $this->form = $user->toArray();
        $this->form['role'] = $user->roles->first()->id;
        $this->form['created_at'] = Carbon::parse($user->created_at)->format('Y-m-d\TH:i');
        $this->userModal = true;
    }

    public function openDeleteUserModal($id)
    {
        $this->form = User::find($id)->toArray();
        $this->deleteUserModalConfirm = true;
    }

    public function editUser()
    {
        $this->validate();

        $user = User::find($this->form['id']);
        $role = Role::find($this->form['role']);
        $user->syncRoles($role->name);

        $this->userModal = false;
        $this->emit('userTableColumns');
    }

    public function deleteUser()
    {
        User::destroy($this->form['id']);
        $this->deleteUserModalConfirm = false;
        $this->emit('userTableColumns');
    }

    public function render()
    {
        return view('livewire.verify');
    }
}
