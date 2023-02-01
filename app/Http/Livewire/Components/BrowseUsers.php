<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BrowseUsers extends Component
{
    use WithPagination;

   public function render()
    {
        return view('livewire.components.browse-users', [
            'users' => User::select('id', 'name', 'email', 'created_at')
                ->latest()
                ->paginate(25)
        ]);
    }
}
