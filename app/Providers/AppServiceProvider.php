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

        // Repositories
        $this->app->bind('App\Repositories\ConversationRepositoryInterface', 'App\Repositories\ConversationRepository');
        $this->app->bind('App\Repositories\ItemRepositoryInterface', 'App\Repositories\ItemRepository');
        $this->app->bind('App\Repositories\MessageRepositoryInterface', 'App\Repositories\MessageRepository');
        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepository');

        // Services
        $this->app->bind('App\Services\MessageServiceInterface', 'App\Services\MessageService');
    }
}
