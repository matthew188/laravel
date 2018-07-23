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
//Route::get('hellourl',function (){
//   return view('hello',['website'=>"网站2"]);
//});
Route::view('hellourl','hello' ,['website'=>"网站11"]);
Route::match(['get', 'post'], 'foo', function () {
    return 'This is a request from get or post';
});

Route::get('posts-i/{post}/comments-id/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});

Route::match(['get','post'],'foo',function(){
    return 'this is a get or post';
});
Route::get('form',function (){
    return '<form method="post" action="/foo">'.'<button type="submit">提交</button></form>';
});
Route::get('user/{name}', function ($name) {
    // $name 必须是字母且不能为空
    return 'name:'.$name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    // $id 必须是数字
    return 'id:'.$id;
});
Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});
Route::get('user/{id}/profile', function ($id) {
    $url = route('profile', ['id' => 1]);
    return $url;
})->name('profile');
Route::domain('{account}.lara.blog.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        return 'This is ' . $account . ' page of User ' . $id;
    });
});
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return '123';
    });
});