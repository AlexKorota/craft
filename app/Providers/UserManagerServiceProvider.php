<?php

namespace App\Providers;

use App\Managers\UserManager\UserManager;
use Illuminate\Support\ServiceProvider;

class UserManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserManager::class, function(){
        	return new UserManager();
        });
    }
}
