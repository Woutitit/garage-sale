<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }

        $this->app->bind('App\Repositories\ItemRepositoryInterface', 'App\Repositories\ItemRepository');
    }
}
