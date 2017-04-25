<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('/',function(){
    return redirect()->route('admin::useradd');
});


Route::get('/',function(){
    return showMsg('测试一下好不好用','/useradd');
});




Route::group(['as'=>'admin::','middleware'=>'admin'],function(){
    Route::any('/useradd',['as'=>'useradd','uses'=>'Admin\UserController@add']);
    Route::match(['post','get'],'/userlist',['as'=>'userlist','uses'=>'Admin\UserController@index']);
    Route::post('/userdel','Admin\UserController@del');
    Route::match(['post','get'],'/useredit',['uses'=>'Admin\UserController@upd']);
});