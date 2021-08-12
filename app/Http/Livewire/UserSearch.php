<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public $name = '';

    public $users = [];

    public function render()
    {
        return view('livewire.user-search', [
            'users'
        ]);
    }

    public function search()
    {
        $this->users = User::where('name', 'like', "%$this->name%")->get();
    }
}
