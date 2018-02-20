<?php

namespace App\Managers\CategoryManager\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \App\Managers\CategoryManager\CategoryManager::class;
	}
}