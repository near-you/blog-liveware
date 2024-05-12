<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class MenuItems extends Component
{
    public string $data;

    // public function mount(): void
    // {
    //     $this->data = '$data';
    // }

    /* public function render($data): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.menu-items',['data'=> "$data"]);
    } */
}
