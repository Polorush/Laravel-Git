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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/article', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', ['as' => 'users.index', 'uses' => 'UserController@index']);

Route::put('user/comments/delete/{id}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);

Route::post('/article/{id}/comment/create', ['as' => 'comment.create', 'uses' => 'CommentController@create']);

Route::get('article/like/{id}', ['as' => 'article.like', 'uses' => 'LikeController@likeArticle']);

Route::post('/article/{article}/comments', 'CommentsController@store');

Route::get('/contact', ['as' => 'contact', 'uses' => 'FormsController@create']);

Route::post('/contact', ['as' => 'contact_store', 'uses' => 'FormsController@store']);

Route::group(['middleware' => 'admin'], function () {

Route::get('admin/comments', ['as' => 'comments.admin', 'uses' => 'CommentsController@admin']); 
Route::get('admin/articles', ['as' => 'articles.admin', 'uses' => 'ArticleController@admin']); 
Route::delete('admins/articles/delete/{id}', ['as' => 'article.delete', 'uses' => 'ArticleController@delete']);
Route::delete('admin/comments/delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentsController@delete']);
});

//EXO1

/*Route::get('/iim', function() {
   return view('exo1.iim');
});


Route::get('/bonjour/{name}', function($name) {
    return view('exo1.bonjour', ['prenom' => $name]);
});

Route::get('/test', function() {
    $age = 15;

    $tasks = [
        'Faire le ménage',
        'Envoyer un mail'
    ];

    return view('exo1.test', compact('age', 'tasks'));
});

Route::get('/page1', function() {
    return view('exo1.page1');
});

Route::get('/page2', function() {
    return view('exo1.page2');
});*/
