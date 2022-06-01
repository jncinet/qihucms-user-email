<?php

namespace Jncinet\Qihucms\UserEmail;

use Illuminate\Support\ServiceProvider;

class UserEmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'userEmail');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'userEmail');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/user-email'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/user-email'),
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/user-email'),
        ]);
    }
}
