<?php

namespace App\Providers;

use App\Managers\RoleManager\RoleManager;
use Illuminate\Support\ServiceProvider;

class RoleManagerServiceProvider extends ServiceProvider
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
	    $this->app->bind(RoleManager::class, function(){
		    return new RoleManager();
	    });
    }
}
