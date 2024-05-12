<?php

namespace App\Livewire;

use App\Models\About\Skill;
use App\Models\About\SkillTitle;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\About\About as AboutModel;
use App\Models\Home\Home;


class About extends Component
{
    public Model $home;
    public Model $about;
    public Carbon $birth;
    public string $birthday;
    public Model $skillTitleRight;
    public Model $skillTitleLeft;
    public Collection $skillRight;
    public Collection $skillLeft;
    public Collection $knowledge;
    public Collection $interests;
    public Collection $educations;
    public Collection $experiences;

    public function mount()
    {
        $this->home = Home::query()->firstOrNew();
        $this->about = AboutModel::query()->firstOrNew();
        $this->birth = Carbon::make($this->about->date_of_birth);
        $this->birthday = $this->birth->toFormattedDateString();
        $this->skillTitleRight = SkillTitle::query()->firstOrNew();
        $this->skillTitleLeft = SkillTitle::query()->orderby('id', 'desc')->first();
        $this->skillRight = SkillTitle::query()->find($this->skillTitleRight->id)->skill;
        $this->skillLeft = SkillTitle::query()->find($this->skillTitleLeft->id)->skill;
        $this->knowledge = $this->about->knowledge()->get();
        $this->interests = $this->about->interest()->get();
        $this->educations = $this->about->education()->get();
        $this->experiences = $this->about->experience()->get();
    }

    #[Title('Blog | About')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('about');
    }
}
