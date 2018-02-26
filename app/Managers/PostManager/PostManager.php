<?php

namespace App\Managers\PostManager;


use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use Image;

class PostManager
{
	/**
	 * Index page output logic.
	 * @return Post(s)
	 * @internal param int $id
	 */
	public function indexPostManage()
	{
		if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
		    $posts = Post::all();
	    } elseif (Auth::user()->hasRole(['author'])){
		    $posts = Post::where('author_id', Auth::id());
	    }

	    return $posts;
	}

	/**
	 * Save new or update post.
	 *
	 * @param $request
	 * @param $id
	 *
	 * @return Post (s)
	 * @internal param int $id
	 */
	public function managePost($request, $id)
	{
		if(is_null($id)){
			$post = new Post();
		} else {
			$post = Post::FindOrFail($id);
			if( !(Auth::user()->id == $post->author_id || Auth::user()->hasRole( 'superadministrator'))){
				return redirect()->route( 'home' );
			}
		}
		$post->title = $request->title;
		$post->slug = $request->slug;
		$post->author_id = Auth::id();
		$post->category_id = $request->category;
		$post->excerpt = Purifier::clean(substr(strip_tags($request->content), 0, 600));
		$post->content = Purifier::clean($request->content);
//	    $post->status = $request->status; //If status == 1 => it's draft; if == 2 => published

		if($request->tags) {
			$attached_tags = [];
			$tags = explode(',', $request->tags);
			foreach ($tags as $tag) {
				$tag = trim($tag, '\'"#');
				if(!Tag::where('name', $tag)->exists()){
					$newtag = new Tag();
					$newtag->name = $tag;
					$newtag->save();
					$attached_tags[] = $newtag->id;
				} else {
					$oldtag = Tag::where('name', $tag)->first();
					$attached_tags[] = $oldtag->id;
				}
			}
		}

		//Saving image
		if($request->hasFile('image')) {
			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('post_images/' . $filename);
			Image::make($image)->resize(800, 800)->save($location);

			$post->image = $filename;
		}

		$post->save();
		if($request->tags) {
			$post->tags()->sync($attached_tags);
		}
		return $post;
	}

	/**
	 * delete post.
	 *
	 * @param $id
	 *
	 * @return void
	 * @internal param int $id
	 */
	public function deletePost($id)
	{
		$post = Post::FindOrFail($id);;
		$post->tags()->detach();
	    $post->delete();
	}

	/**
	 * Change post status draft/published.
	 *
	 * @param $request
	 * @param $id
	 *
	 * @return Post (s)
	 *
	 */
	public function editPostStatus($request, $id)
	{
		$post = Post::FindOrFail($id);
		$post->status = $request->status;
		$post->save();
		return $post;
	}

	/**
	 * Find post by tag.
	 *
	 * @param  int  $id
	 * @return Post(s) with pagination
	 */
	public function findPostsByTag($id)
	{
		$posts = Tag::findOrFail($id)->posts()->paginate(2);

		return $posts;
	}

}