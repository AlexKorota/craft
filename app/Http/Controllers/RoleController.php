<?php

namespace App\Http\Controllers;

use App\Managers\RoleManager\Facades\RoleManager;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $roles = Role::all();
	    return view('manage.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $permissions = Permission::all();
	    return view('manage.roles.create')->withPermissions($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, [
		    'display_name' => 'required|max:100',
		    'name'         => 'required|max:20|unique:roles,name|alpha_dash',
		    'description'  => 'sometimes|max:255'
	    ]);

	    $role = RoleManager::storeRole($request);
	    return redirect()->route('roles.show', $role->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $role = Role::FindOrFail($id);
	    return view('manage.roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $role = Role::FindOrFail($id);
	    $permissions = Permission::all();
	    return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, $id)
    {
	    $this->validate($request, [
		    'display_name' => 'required|max:100',
		    'description'  => 'sometimes|max:255'
	    ]);

	    $role = RoleManager::updateRole($request, $id);

	    return redirect()->route('roles.show', $role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
