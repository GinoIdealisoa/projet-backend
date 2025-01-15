<?php

namespace App\Filament\Widgets;

use Livewire\Component;
use App\Models\User;

class UserCountWidget extends Component
{
    public $userCount;

    public function mount()
    {
        $this->userCount = User::count();
    }

    public function render()
    {
        return view('filament.widgets.user-count-widget', [
            'userCount' => $this->userCount,
        ]);
    }
}