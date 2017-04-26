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

Route::any('/', function () {
    return ['a' => 'a'];
});

Route::controller('config', 'ConfigController');

Route::any('/wechat', 'WechatController@serve');
Route::any('/qrcode-img', 'WechatController@qrcodeImg');
//Route::get('/',function(){
//    return showMsg('测试一下好不好用','/useradd');
//});

Route::group(['as' => 'wechat::', 'middleware' => 'wechat.oauth:snsapi_userinfo'], function () {
    Route::controller('/test', 'Wechat\IndexController');
    Route::controller('qrcode', 'Wechat\QrcodeController');
});

Route::group(['as' => 'admin::', 'middleware' => 'admin'], function () {
    Route::any('/useradd', ['as' => 'useradd', 'uses' => 'Admin\UserController@add']);
    Route::match(['post', 'get'], '/userlist', ['as' => 'userlist', 'uses' => 'Admin\UserController@index']);
    Route::post('/userdel', 'Admin\UserController@del');
    Route::match(['post', 'get'], '/useredit', ['uses' => 'Admin\UserController@upd']);
    Route::controller('category', 'Admin\CategoryController', [
        'anyAdd' => 'category.add',
        'anyList' => 'category.index',
        'anyUpd' => 'category.upd',
        'anyDel' => 'category.del',
    ]);

    Route::controller('ware', 'Admin\WareController', [
        'anyAdd' => 'ware.add',
        'anyList' => 'ware.index',
        'anyUpd' => 'ware.upd',
        'anyDel' => 'ware.del'
    ]);

    Route::post('/upload', ['as' => 'upload', 'uses' => 'Admin\CommonController@upload']);


});