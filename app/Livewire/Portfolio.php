<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Portfolio extends Component
{
    #[Title('Blog | Portfolio')]
    public function render()
    {
        return view('portfolio');
    }
}
