<?php

namespace App\Managers\PermissionManager;

use App\Permission;
use Illuminate\Support\Facades\Session;


class PermissionManager
{

	public function storeBasicPermission($request)
	{
		$permission = new Permission();
		$permission->display_name = $request->display_name;
		$permission->name = $request->name;
		$permission->description = $request->description;
		$permission->save();

		Session::flash('success', 'Добавлены новые разрешения для пользователей');
	}

	public function storeCrudPermission($request)
	{
		$crud = explode( ',', $request->crud_selected );
		if ( count( $crud ) > 0 ) {
			foreach ( $crud as $x ) {
				$slug         = strtolower( $x ) . '-' . strtolower( $request->resource );
				$display_name = ucwords( $x . " " . $request->resource );
				$description  = "Позволяет пользователю " . strtoupper( $x ) . ' ' . ucwords( $request->resource );

				$permission = new Permission();
				$permission->name = $slug;
				$permission->display_name = $display_name;
				$permission->description  = $description;
				$permission->save();
			}
			Session::flash( 'success', 'Добавлены новые разрешения для пользователей' );
		}
	}

	public function updatePermission($request, $id)
	{
		$permission = Permission::findOrFail($id);
		$permission->display_name = $request->display_name;
		$permission->description = $request->description;
		$permission->save();
		Session::flash('success', 'Резрешение '. $permission->display_name . ' успешно отредактировано.');
	}
}