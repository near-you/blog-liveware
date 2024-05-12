<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class News extends Component
{
    #[Title('Blog | News')]
    public function render()
    {
        return view('news');
    }
}
