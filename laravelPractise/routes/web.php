<?php

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
    return view('pages.index');
});
//Route::get('home',function(){
  //echo "This is Home Page";
//});

//Route::get('/about','HelloController@Manush');
//Route::get('/blog','HelloController@Guru')->name('blog');
//Route::get(md5('/contact'),'BoloController@Bolo')->name('contact');

//Route::get('/contact',function(){
  //return view('pages.contact');
//})->middleware('age');
Route::get('about/us','helloController@about')->name('about');
Route::get('contact/us','helloController@contact')->name('contact');


//Category route here....
Route::get('add/categorie','boloController@addCategorie')->name('add.categorie');
Route::post('store/category','boloController@storeCategory')->name('store.category');
Route::get('all/category','boloController@allCategory')->name('all.category');
Route::get('view/category/{id}','boloController@viewCatetory');
Route::get('delete/category/{id}','boloController@deleteCatetory');
//post route here....
Route::get('write/post','PostController@writePost')->name('write.post');
Route::post('store/post','PostController@StorePost')->name('store.post');
Route::get('all/post','PostController@allPost')->name('all.post');
Route::get('view/post/{id}','postController@viewPost');
Route::get('edit/post/{id}','postController@editPost');
Route::get('delete/post/{id}','postController@deletePost');
