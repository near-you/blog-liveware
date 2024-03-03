<?php

namespace App\Livewire;

use App\Models\Service\Facts;
use App\Models\Service\Partners;
use App\Models\Service\Pricing;
use App\Models\Service\WhatIDo;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

class Service extends Component
{
    #[Title('Blog | Service')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $whatIDos = WhatIDo::all();
        $partners = Partners::all();
        $facts = Facts::all();
        $pricings = Pricing::all();

        return view('service', [
            'whatIDos'=> $whatIDos,
            'partners'=> $partners,
            'facts' => $facts,
            'pricings' => $pricings,
        ]);
    }
}
