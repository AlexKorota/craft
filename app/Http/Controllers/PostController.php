<?php

namespace App\Http\Controllers;

use App\Category;
use App\Managers\PostManager\Facades\PostManager;
use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Purifier;
use Image;

class PostController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
	    $posts = PostManager::indexPostManage();

	    return view('manage.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::all();
	    return view('manage.posts.create')->withCategories($categories);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
        	'category'  => 'required',
	        'title'     => 'required|max:255',
	        'slug'      => 'required|unique:posts',
	        'content'   => 'required',
	        'image'     => 'image'
        ]);

	    $post = PostManager::managePost($request, $id = null);
	    return redirect()->route('posts.show', $post->id);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param PostRepository $post
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function show(PostRepository $post, $id)
    {
	    $post = $post->findPost($id);

	    return view('manage.posts.show')->withPost($post);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param PostRepository $post
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function edit(PostRepository $post, $id)
    {
	    $post = $post->findPost($id);
	    if(Auth::user()->id == $post->author_id || Auth::user()->hasRole( 'superadministrator')){
		    $categories = Category::all();
		    return view('manage.posts.edit')->withPost($post)->withCategories($categories);
	    } else {
		    return redirect()->route( 'home' );
	    }

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
		    'category' => 'required',
		    'title'    => 'required|max:255',
		    'content'  => 'required',
		    'image'    => 'image'
	    ]);

	    $post = PostManager::managePost($request, $id);

	    return redirect()->route('posts.show', $post->id);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function destroy($id)
    {
	    PostManager::deletePost($id);

	    return redirect()->route('posts.index');
    }

	/**
	 * @param Request $request
	 *
	 * @return string
	 */
	public function apiCheckUnique(Request $request)
	{
		return json_encode(!Post::where('slug', '=', $request->slug)->exists());
	}

	/**
	 * @param Request $request
	 * @param $id
	 *
	 * @return mixed
	 */
	public function editPostStatus(Request $request, $id)
	{
		$post = PostManager::editPostStatus($request, $id);

		return view('manage.posts.show')->withPost($post);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function findPostsByTag($id)
	{
		$posts = PostManager::findPostsByTag($id);

		return view('home')->withPosts($posts);
	}

	/**
	 * @param $category
	 *
	 * @return mixed
	 */
	public function findPostsByCategory($category)
	{
		$posts = PostManager::findPostsBycategory($category);

		return view('home')->withPosts($posts);
	}
}
