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
    return redirect('/useradd');
});

Route::controller('config', 'ConfigController');
Route::controller('test', 'TestController');


Route::any('/qrcode-img', 'WechatController@qrcodeImg');
//Route::get('/',function(){
//    return showMsg('测试一下好不好用','/useradd');
//});
Route::any('/admin-login','Admin\IndexController@login');
Route::any('/admin-loginout','Admin\IndexController@loginOut');



Route::any('/wechat', 'WechatController@serve');
Route::group(['as' => 'wechat::', 'middleware' => ['wechat.oauth:snsapi_userinfo','wechat','auto.reward']], function () {
    Route::controller('index', 'Wechat\IndexController');
    Route::controller('user','Wechat\UserController');
    Route::controller('good','Wechat\GoodController');
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

    Route::controller('withdraw','Admin\WithdrawController',[
        'anyList' => 'withdraw.list',
        'anyDel' => 'withdraw.del',
        'anyApply' => 'withdraw.apply',
    ]);

});