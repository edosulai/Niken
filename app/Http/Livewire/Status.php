<?php

namespace App\Http\Livewire;

use App\Models\Status as ModelsStatus;
use Livewire\Component;

class Status extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.status');
    }
}
