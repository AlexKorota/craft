<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{

	public function findPost($id)
	{
		return Post::FindOrFail($id);
	}

}