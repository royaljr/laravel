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
/*
Route::get('/', function () {
    return view('welcome');
}); */

/*
Route::get( '/', function(){
	return view('master');
});

*/

Route::get( '/', 'WelcomeController@index');
Route::get( '/contact', 'WelcomeController@contact');
Route::get( '/gallery', 'WelcomeController@gallery');

/*Admin Login*/
Route::get( '/admin', 'AdminController@index');
/*Login Dashboard*/
Route::post( '/admin_login', 'AdminController@adminLogin');

/*Login Dashboard SuperAdmin*/
Route::get( '/dashboard', 'SuperAdminController@index');

/*Login Dashboard SuperAdmin*/
Route::get( '/logout', 'SuperAdminController@logout');

/*Add category*/
Route::get('/add-category', 'SuperAdminController@addCategory');


/*Save category*/
Route::post('/add-category', 'SuperAdminController@saveCategory');

/*Manage Category*/
Route::get('/manage-category', 'SuperAdminController@manageCategory');

/*Unpublished Category*/
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublishedCategory');

/*Published Category*/
Route::get('/published-category/{id}', 'SuperAdminController@publishedCategory');

/*Delete Category*/
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');

/*Edit Category*/
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');

/*Update Category*/
Route::post('/update-category', 'SuperAdminController@updateCategory');

/*Add Post*/
Route::get('/add-blog', 'SuperAdminController@addBlog');

/*Save Post*/
Route::post('/save-post', 'SuperAdminController@savePost');

/*Save Post*/
Route::get('/manage-post', 'SuperAdminController@managePost');

/*Unpublished Post*/
Route::get('/unpublished-post/{id}', 'SuperAdminController@unpublishedPost');

/*Published Post*/
Route::get('/published-post/{id}', 'SuperAdminController@publishedPost');

/*Delete Post*/
Route::get('/delete-post/{id}', 'SuperAdminController@deletePost');

/*Edit Post*/
Route::get('/edit-post/{id}', 'SuperAdminController@editPost');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
