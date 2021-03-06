<?php

namespace App\Providers;


use App\Managers\CategoryManager\CategoryManager;
use Illuminate\Support\ServiceProvider;

class CategoryManagerServiceProvider extends ServiceProvider
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
	    $this->app->bind(CategoryManager::class, function(){
		    return new CategoryManager();
	    });
    }
}
