<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{   
    public $name;
    public $email;
    public $password;
    public $role;
    public function render()
    {   
        $roles = Role::all();
        return view('livewire.user-create', [
            'roles' => $roles
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'email'=> 'required|email|unique:users,email',
        'password'=> 'required|min:6',
        'role' => 'required',
    ];

    public function submitForm() {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->role);

        flash()->addSuccess('User has been added!');
    }

}
