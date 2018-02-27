<?php

namespace App\Managers\CategoryManager;

use App\Category;
use Image;

class CategoryManager
{

	public function storeCategory($request)
	{
		$category = new Category();
		$category->name = $request->name;

		$image    = $request->file( 'image' );
		$filename = $request->name . '-icon' . '.' . $image->getClientOriginalExtension();
		$location = public_path( 'category_images/' . $filename );
		Image::make( $image )->resize( 96, 96 )->save( $location );
		$category->image = $filename;

		$category->save();
		return $category;
	}

}