<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/administrations', 'App\Http\Controllers\AdministrationController@getAdministrationView')->name('administrations');

Route::get('/roles', 'App\Http\Controllers\AdministrationController@getRolesView')->name('roles');

Route::get('/newRole', 'App\Http\Controllers\AdministrationController@newRole')->name('newRole');

Route::post('/newRole', 'App\Http\Controllers\AdministrationController@roleInsert');

Route::get('/role/edit/{role}', 'App\Http\Controllers\AdministrationController@roleEdit');

Route::post('/role/{role}', 'App\Http\Controllers\AdministrationController@roleSave');

Route::delete('/role/{role}', 'App\Http\Controllers\AdministrationController@roleDelete');


Route::group(['prefix' => 'users'], function () {
    Route::put('/{user_id}/role', 'App\Http\Controllers\UserController@updateUserRole')->name('updateRole');
    Route::post('/add', 'App\Http\Controllers\UserController@addUser')->name('adduser');
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'App\Http\Controllers\PostController@getPostsView')->name('posts');    
    Route::get('/new', 'App\Http\Controllers\PostController@getNewPostView')->name('newPost');
    Route::post('/', 'App\Http\Controllers\PostController@saveNewPost')->name('posts');
    Route::get('/edit/{post}', 'App\Http\Controllers\PostController@postEdit');
    Route::post('/{post}', 'App\Http\Controllers\PostController@savePost');
    Route::delete('/{post}', 'App\Http\Controllers\PostController@deletePost');
    Route::get('/details/{post}', 'App\Http\Controllers\PostController@postDetails');
});

Route::group(['prefix' => 'menus'], function () {
    Route::get('/', 'App\Http\Controllers\MenuController@getMenusView')->name('menus');    
    Route::get('/new', 'App\Http\Controllers\MenuController@getNewMenuView')->name('newMenu');
    Route::post('/', 'App\Http\Controllers\MenuController@saveNewMenu')->name('menus');
    Route::get('/edit/{menu}', 'App\Http\Controllers\MenuController@menuEdit');
    Route::post('/{menu}', 'App\Http\Controllers\MenuController@saveMenu');
    Route::delete('/{menu}', 'App\Http\Controllers\MenuController@deleteMenu');
    Route::get('/details/{post}', 'App\Http\Controllers\PostController@postDetails');
    
});

Route::get('/addPostToMenu', 'App\Http\Controllers\MenuController@addPostToMenuView')->name('addPostToMenu');

Route::post('/savePost', 'App\Http\Controllers\MenuController@savePostToMenu');
Route::delete('/deletePost/{menu}/{post}', 'App\Http\Controllers\MenuController@deletePostFromMenu');

Route::post('/changeLanguage', 'App\Http\Controllers\LanguageController@changeLanguage')->name('changeLanguage');
