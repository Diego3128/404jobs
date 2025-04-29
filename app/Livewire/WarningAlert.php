<?php

namespace App\Livewire;

use Livewire\Component;

class WarningAlert extends Component
{
    public $messages;
    public function render()
    {
        return view('livewire.warning-alert');
    }
}
