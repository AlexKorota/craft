<?php

namespace App\Managers\CategoryManager;

use App\Category;
use LaraFlash;

class CategoryManager
{

	public function storeCategory($request)
	{
		$category = new Category();
		$category->name = $request->name;
		$category->save();

		LaraFlash::success('Категория успешно добавлена');

		return $category;
	}

}