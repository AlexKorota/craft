<?php

namespace App\Managers\CategoryManager;

use App\Category;

class CategoryManager
{

	public function storeCategory($request)
	{
		$category = new Category();
		$category->name = $request->name;
		$category->save();

		return $category;
	}

}