<?php

namespace App\Http\Controllers;

use App\Managers\PermissionManager\Facades\PermissionManager;
use App\Permission;
use Illuminate\Http\Request;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param PermissionManager $permission_manager
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function store(Request $request)
    {
        if ($request->permission_type == 'basic'){
        	$this->validate($request,[
        		'display_name' => 'required|max: 50',
        		'name'         => 'required|max: 50|alpha_dash|unique:permissions,name',
        		'description'  => 'sometimes|max: 255',
	        ]);

	        PermissionManager::storeBasicPermission($request);

        } elseif($request->permission_type == 'crud') {
	        $this->validate( $request, [
		        'resource' => 'required|max:50|alpha',
	        ] );

	        PermissionManager::storeCrudPermission($request);
        }
	        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::FindOrFail($id);
        return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $permission = Permission::FindOrFail($id);
	    return view('manage.permissions.edit')->withPermission($permission);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param PermissionManager $permission_manager
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, $id)
    {
	    $this->validateWith([
		    'display_name' => 'required|max: 50',
		    'description'  => 'sometimes|max: 255',
	    ]);

	    PermissionManager::updatePermission($request, $id);

	    return redirect()->route('permissions.show', $id);
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
