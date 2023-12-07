<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Home as HomeModel;
class Home extends Component
{

    #[Title('Blog | Home')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $home = HomeModel::query()->firstOrFail();
        return view('home', ['home' => $home]);
    }
}
