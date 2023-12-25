<?php

namespace App\Livewire;

use App\Models\About\Skill;
use App\Models\About\SkillTitle;
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
        $skillTitleRight = SkillTitle::query()->firstOrFail();
        $skillTitleLeft = SkillTitle::query()->orderby('id', 'desc')->first();
        $skillRight = SkillTitle::query()->find($skillTitleRight->id)->skill;
        $skillLeft = SkillTitle::query()->find($skillTitleLeft->id)->skill;
        $knowledge = $about->knowledge()->get();
        $interests = $about->interest()->get();
        $educations = $about->education()->get();
        $experiences = $about->experience()->get();

        return view('about', [
            'home' => $home,
            'about' => $about,
            'birthday' => $birth->toFormattedDateString(),
            'skillTitleLeft' => $skillTitleLeft,
            'skillTitleRight' => $skillTitleRight,
            'skillLeft' => $skillLeft,
            'skillRight' => $skillRight,
            'knowledge' => $knowledge,
            'interests' => $interests,
            'educations' => $educations,
            'experiences' => $experiences,
        ]);
    }
}
