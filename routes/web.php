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

/**
 * 公共路由
 */
Route::get('/', function () {
    return redirect('home/index');
});

/**
 * 前台
 * 路由前缀 home
 * 目录 Home
 */
Route::group(['prefix' => 'home', 'namespace' => 'Home'], function (){
    // 商城首页
    Route::get('index', 'IndexController@index')->name('home.index');
    // 用户注册
    Route::get('register', 'UserController@register')->name('home.register');
    // 用户登录
    Route::get('login', 'UserController@login')->name('home.login');
    // 商品列表页
    Route::get('list', 'GoodsController@list')->name('home.list');
    // 商品详情页
    Route::get('detail', 'GoodsController@detail')->name('home.detail');
    // 个人中心
    Route::get('member', 'MemberController@index')->name('home.member');
});

/**
 * 后台
 * 路由前缀 admin
 * 目录 Admin
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    // 后台首页
    Route::get('index', 'IndexController@index')->name('admin.index');
    // 后台登录
    Route::get('login', 'UserController@login')->name('admin.login');
});
