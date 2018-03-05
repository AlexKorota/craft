<?php

namespace App\Http\Controllers;

use App\Post;
use LaraFlash;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$posts = \App\Post::paginate(3);
        return view('home')->withPosts($posts);
    }

	public function postShow($id)
	{
		$post = Post::FindOrFail($id);

		return view('posts.show')->withPost($post);
	}
}
