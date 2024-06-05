<?php

namespace App\Livewire;

use Livewire\Component;
use App\Actions\ActiveMenuItems;

class MenuItems extends Component
{
    public $data;

    public function mount()
    {
        $this->data = (new ActiveMenuItems())->handle();
    }
    public function render()
    {
        return view('livewire.menu-items');
    }
}
