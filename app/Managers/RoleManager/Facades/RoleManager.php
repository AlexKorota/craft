<?php

namespace App\Managers\RoleManager\Facades;

use Illuminate\Support\Facades\Facade;

class RoleManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \App\Managers\RoleManager\RoleManager::class;
	}
}