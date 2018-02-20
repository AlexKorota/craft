<?php

namespace App\Managers\RoleManager;


use App\Role;
use Illuminate\Support\Facades\Session;

class RoleManager
{
	public function storeRole($request)
	{
		$role = new Role();
		$role->display_name = $request->display_name;
		$role->name = $request->name;
		$role->description = $request->description;
		$role->save();

		if ($request->permissions){
			$role->syncPermissions(explode(',', $request->permissions));
		}

		Session::flash('success', 'Роль '. $role->display_name . ' успешно создана.');

		return $role;
	}

	public function updateRole($request, $id)
	{
		$role = Role::findOrFail($id);
		$role->display_name = $request->display_name;
		$role->description = $request->description;
		$role->save();

		if ($request->permissions){
			$role->syncPermissions(explode(',', $request->permissions));
		}

		Session::flash('success', 'Роль '. $role->display_name . ' успешно отредактирована.');

		return $role;
	}
}