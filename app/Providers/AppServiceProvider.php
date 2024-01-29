<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserLoginService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserLoginService::class, function ($app) {
            return new UserLoginService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
