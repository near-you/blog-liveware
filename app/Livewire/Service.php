<?php

namespace App\Livewire;

use App\Models\Service\Service as ServiceModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

class Service extends Component
{
    public Builder|Model $serviceModel;

    public Collection $whatIDoSection;

    public Collection $partnersSection;

    public int $count;

    public function mount(): void
    {
        $this->serviceModel = ServiceModel::query()->firstOrNew();
        $this->whatIDoSection = $this->serviceModel->serviceWhatIDoSection;
        $this->partnersSection = $this->serviceModel->servicePartnerSection;
        $this->count = 1;
    }
    #[Title('Blog | Service')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
//        $serviceModel = ServiceModel::query()->firstOrNew();
//        dd($serviceModel->serviceWhatIDoSection);
//        $whatIDoSection = $serviceModel->serviceWhatIDoSection;
//        dd($whatIDoSection);
//        $partners = Partners::all();
//        $facts = Facts::all();
//        $pricings = Pricing::all();

        return view('service'/*, [
            'whatIDosSection'=> $whatIDoSection,
//            'partners'=> $partners,
//            'facts' => $facts,
//            'pricings' => $pricings,
        ]*/);
    }
}
