<?php

namespace App\Managers\UserManager\Facades;

use Illuminate\Support\Facades\Facade;

class UserManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \App\Managers\UserManager\UserManager::class;
	}
}