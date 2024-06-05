<?php

namespace App\Livewire;

use App\Actions\ActiveMenuItems;
use App\Models\Home\Home as HomeModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public Model $home;

    public function mount(): void
    {
        $this->home = HomeModel::query()->firstOrNew();
    }

    #[Title('Blog | Home')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }
}
