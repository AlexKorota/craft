<?php

namespace App\Managers\PostManager\Facades;

use Illuminate\Support\Facades\Facade;

class PostManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \App\Managers\PostManager\PostManager::class;
	}
}