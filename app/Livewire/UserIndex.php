<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {   
        $user = User::paginate(12);
        return view('livewire.user-index', [
            'users' => $user
        ]);
    }
}
