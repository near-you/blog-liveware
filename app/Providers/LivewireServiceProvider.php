<?php

namespace App\Providers;

use App\Models\Portfolio\Portfolio;
use Illuminate\Support\ServiceProvider;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('livewire.menu-items', function ($view) {
            $data = Portfolio::query()->value('is_active');
            $view->with('data', $data);
        });
    }
}
