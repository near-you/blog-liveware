<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\About\About as AboutModel;
use App\Models\Home\Home;


class About extends Component
{
    #[Title('Blog | About')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $home = Home::query()->firstOrFail();
        $about = AboutModel::query()->firstOrFail();
        $birth = Carbon::make($about->date_of_birth);

        return view('about', [
            'home' => $home,
            'about' => $about,
            'birthday' => $birth->toFormattedDateString()
        ]);
    }
}
