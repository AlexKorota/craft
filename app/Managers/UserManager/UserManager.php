<?php

namespace App\Managers\UserManager;

use Image;


class UserManager
{

	public function updateUser($user, $request, $id)
	{
		$user->name        = $request->name;
		$user->description = $request->description;
		//Saving image
		if ( $request->hasFile( 'avatar' ) ) {
			$image    = $request->file( 'avatar' );
			$filename = $user->name . time() . '.' . $image->getClientOriginalExtension();
			$location = public_path( 'users_avatars/' . $filename );
			Image::make( $image )->resize( 128, 128 )->save( $location );
			$user->avatar = $filename;
		}

		$user->save();
		$user->syncRoles( explode( ',', $request->roles ) );

		return $user;
	}

}