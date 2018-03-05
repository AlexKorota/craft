<?php

namespace App\Http\Controllers;

use App\Managers\UserManager\Facades\UserManager;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::orderBy('id', 'desc')->paginate(20);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $user = User::where('id',$id)->with('roles')->first();
	    if(Auth::user()->id == $user->id || Auth::user()->hasRole('superadministrator')){
		    $roles = Role::all();
		    return view('manage.users.edit')->withUser($user)->withRoles($roles);
	    } else {
	    	return redirect()->route('home');
	    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
	    $this->validate($request, [
		    'avatar' => 'image',
		    'name'    => 'required',

	    ]);
	    $user = User::findOrFail( $id );
	    if ( Auth::user()->id == $user->id || Auth::user()->hasRole( 'superadministrator' ) ) {

	    	UserManager::updateUser($user, $request, $id);

		    return redirect()->route( 'users.show', $user->id );
	    } else {
		    return redirect()->route( 'home' );
	    }
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
