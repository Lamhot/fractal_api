<?php

namespace App\Providers;

use App\Repositories\PenulisRepository;
use App\Repositories\IPenulis;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPenulis::class, PenulisRepository::class);
    }
}
