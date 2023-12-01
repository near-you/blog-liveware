<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Title('Blog | Contact')]
    public function render()
    {
        return view('contact');
    }
}
