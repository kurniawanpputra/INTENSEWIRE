<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Frontend Routes
Route::get('/', 'FrontendController@index');
Route::get('/{slug}', 'FrontendController@single')->name('post.single');
Route::get('/category/{name}', 'FrontendController@category')->name('category.single');
Route::get('/tag/{tag}', 'FrontendController@tag')->name('tag.single');
Route::post('/results', 'FrontendController@results')->name('search');

// Admin Routes
Route::group(['prefix' => 'admin'], function(){ 
    Auth::routes(); 
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::get('/posts', 'PostsController@index')->name('posts');

    Route::get('/restore/post/{id}', 'PostsController@restore')->name('post.restore');

    Route::get('/posts/trashed', 'PostsController@trashed')->name('trashed.posts');

    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');

    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');

    Route::get('/post/edit/{slug}', 'PostsController@edit')->name('post.edit');

    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');

    Route::get('/post/create', 'PostsController@create')->name('post.create');

    Route::post('/post/store', 'PostsController@store')->name('post.store');

    Route::get('/categories', 'CategoriesController@index')->name('categories');

    Route::get('/category/create', 'CategoriesController@create')->name('category.create');

    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');

    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');

    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    Route::post('/category/store', 'CategoriesController@store')->name('category.store');

    Route::get('/tags', 'TagsController@index')->name('tags');

    Route::get('/tag/create', 'TagsController@create')->name('tag.create');

    Route::post('/tag/store', 'TagsController@store')->name('tag.store');

    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');

    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');

    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');

    Route::get('/users', 'UsersController@index')->name('users');

    Route::get('/user/remove/{id}', 'UsersController@destroy')->name('user.remove');

    Route::get('/user/create', 'UsersController@create')->name('user.create');

    Route::post('/user/store', 'UsersController@store')->name('user.store');

    Route::get('/user/makeadmin/{id}', 'UsersController@makeAdmin')->name('user.makeadmin');

    Route::get('/user/removeadmin/{id}', 'UsersController@removeAdmin')->name('user.removeadmin');

    Route::get('/my-profile', 'ProfilesController@index')->name('profile.edit');

    Route::post('/my-profile/update', 'ProfilesController@update')->name('profile.update');

    Route::get('/settings', 'SettingsController@edit')->name('settings');

    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');
});
