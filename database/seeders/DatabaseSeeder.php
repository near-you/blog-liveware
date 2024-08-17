<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\About\Skill;
use App\Models\About\SkillTitle;
use App\Models\Home\Home;
use App\Models\About\About;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Home::factory(1)->create();
        About::factory(1)->create();
//        $about = About::factory(1)->create();
//        $skillTitle = SkillTitle::factory(2)->create();
//
//        $about->each(function ($about) use ($skillTitle) {
//            $about->skillTitles()->attach(
//                $skillTitle->random(1)->pluck('id')->toArray()
//            );
//        });
//
//        $skill = Skill::factory(6)->create();
//
//        $skillTitle->each(function ($skillTitle) use ($skill) {
//            $skillTitle->skills()->attach(
//                $skill->random(rand(1, 2))->pluck('id')->toArray()
//            );
//        });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
