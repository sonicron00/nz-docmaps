<?php

namespace App\Providers;

use App\Repositories\CampsiteRepository;
use App\Repositories\Contracts\CampsiteRepositoryContract;
use App\Repositories\Contracts\HutRepositoryContract;
use App\Repositories\HutRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CampsiteRepositoryContract::class, CampsiteRepository::class);
        $this->app->bind(HutRepositoryContract::class, HutRepository::class);
    }
}
