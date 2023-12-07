<?php

namespace App\Console\Commands;

use App\Models\Home;
use Illuminate\Console\Command;

class CreateHomeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-home-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Home::query()->create([
            'name' => 'Name',
            'surname' => 'Surname',
            'short_description' => 'Hello, World!',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1200px-User-avatar.svg.png',
            'facebook_link' => '#',
            'twitter_link' => '#',
            'linkedin_link' => '#',
            'behance_link' => '#',
            'instagram_link' => '#',
        ]);
    }
}
