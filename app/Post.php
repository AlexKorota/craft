<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Image;
use Purifier;

class Post extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'author_id');
    }


}
