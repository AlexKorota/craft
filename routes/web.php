<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function (){
	return redirect(route('home'));
});

Auth::routes();

Route::match(['get', 'post'], '/posts/tags/{tag}', 'PostController@findPostsByTag')->name('post.findbytag');

Route::resource('/users', 'UserController', ['except' => ['create', 'destroy', 'store']]);

Route::prefix('manage')->middleware('role:superadministrator|administrator|author|subscriber')->group(function (){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy'])->middleware('role:superadministrator');
	Route::resource('/roles', 'RoleController', ['except' => 'destroy'])->middleware('role:superadministrator');
	Route::resource('/categories', 'CategoryController', ['only' => ['index', 'create', 'store']])->middleware('role:superadministrator');
	Route::post('/posts/{id}', 'PostController@editPostStatus')->name('post.status');

	Route::resource('/posts', 'PostController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}', 'HomeController@postShow')->name('post');





