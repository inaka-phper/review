<?php

namespace App\Providers;

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
        $this->app->bind(
            \App\Contracts\UserEntityable::class,
            \App\Entities\UserEntity::class
        );
        $this->app->bind(
            \App\Contracts\ChildEntityable::class,
            \App\Entities\ChildEntity::class
        );
        $this->app->bind(
            \App\Contracts\UserServiceable::class,
            \App\Services\UserService::class
        );
    }
}
