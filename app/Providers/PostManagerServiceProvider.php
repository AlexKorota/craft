<?php

namespace App\Providers;

use App\Managers\PostManager\PostManager;
use Illuminate\Support\ServiceProvider;


class PostManagerServiceProvider extends ServiceProvider
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
        $this->app->bind(PostManager::class, function(){
        	return new PostManager();
        });
    }
}
