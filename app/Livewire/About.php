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
    public $home;
    public $about;
    public $birth;
    public $birthday;
    public $skillTitleLeft;
    public $skillTitleRight;
    public $skillLeft;
    public $skillRight;
    public $knowledge;
    public $interests;
    public $educations;
    public $experiences;

    public function mount()
    {
        $this->home = Home::query()->firstOrNew();
        $this->about = AboutModel::query()->firstOrNew();
        $this->birth = Carbon::make($this->about->date_of_birth);
        $this->birthday = $this->birth->toFormattedDateString();
        $this->skillTitleLeft = SkillTitle::query()->firstOrNew();
        $this->skillTitleRight = SkillTitle::query()->orderby('id', 'desc')->first();
        $this->skillLeft = Skill::query()->where('skill_title_id', '=', $this->skillTitleLeft->id)->get();
        $this->skillRight = Skill::query()->where('skill_title_id', '=', $this->skillTitleRight->id)->get();
        $this->knowledge = $this->about->knowledge()->get();
        $this->interests = $this->about->interest()->get();
        $this->educations = $this->about->education()->get();
        $this->experiences = $this->about->experience()->get();
    }

    #[Title('Blog | About')]
    public function render()
    {
        return view('about');
    }
}
