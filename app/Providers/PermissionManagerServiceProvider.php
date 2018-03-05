<?php

namespace App\Providers;

use App\Managers\PermissionManager\PermissionManager;
use Illuminate\Support\ServiceProvider;


class PermissionManagerServiceProvider extends ServiceProvider
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
	    $this->app->bind(PermissionManager::class, function(){
		    return new PermissionManager();
	    });
    }
}
