<?php

namespace App\Managers\PermissionManager\Facades;

use Illuminate\Support\Facades\Facade;

class PermissionManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return \App\Managers\PermissionManager\PermissionManager::class;
	}
}