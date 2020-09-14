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
    return view('welcome');
});


// Route::any('news/login','News\LoginController@login');
// Route::any('news/logindo','News\LoginController@logindo');

// Route::prefix('news')->middleware('checkuser')->group(function(){
//     Route::any('create','News\NewsController@create');
//     Route::any('store','News\NewsController@store');
//     Route::any('list','News\NewsController@index');
//     Route::any('product/{id}','News\NewsController@product');
// });


Route::middleware('checkuselogin')->group(function(){
// 品牌管理
Route::any('/brand','Admin\BrandController@index')->name('brand');
Route::get('/brand/create','Admin\BrandController@create')->name('brand.create');
Route::post('/brand/store','Admin\BrandController@store');
Route::post('/brand/upload','Admin\BrandController@upload');
Route::get('/brand/edit/{brand_id}','Admin\BrandController@edit');
Route::post('/brand/update/{brand_id}','Admin\BrandController@update');
Route::get('/brand/destroy/{brand_id?}','Admin\BrandController@destroy');
Route::post('/brand/check_name','Admin\BrandController@check_name');


//商品
Route::prefix('goods')->group(function(){
    Route::any('index','Admin\GoodsController@index')->name("goods");
    Route::any('create','Admin\GoodsController@create')->name("goods.create");
    Route::post('upload','Admin\GoodsController@upload');
    Route::any('store','Admin\GoodsController@store');
    Route::any('checkge','Admin\GoodsController@checkge');
    Route::any('ajaxji','Admin\GoodsController@ajaxji');
    Route::get('destroy/{brand_id?}','Admin\GoodsController@destroy');
    Route::get('edit/{goods_id?}','Admin\GoodsController@edit');
    Route::any('update/{goods_id}','Admin\GoodsController@update');
});

// 项目后台分类管理
Route::any('/category','Admin\CategoryController@index')->name('category');//分类列表
Route::any('/category/create','Admin\CategoryController@create')->name('category.create');//分类添加页面
Route::any('/category/store','Admin\CategoryController@store');//分类执行添加
Route::any('/category/destroy/{cate_id}','Admin\CategoryController@destroy');//删除
Route::any('/category/check_cateshows','Admin\CategoryController@check_cateshows');//对错号

//管理员
Route::get('/admin/create','Admin\AdminController@create')->name('admin.create');//表单展示
Route::post('/admin/store','Admin\AdminController@store');//执行添加
Route::post('/admin/upload','Admin\AdminController@upload');//文件上传拖拽
Route::any('/admin','Admin\AdminController@index')->name('admin');//列表展示
Route::get('/admin/edit/{admin_id}','Admin\AdminController@edit');//修改页面
Route::post('/admin/updata/{admin_id}','Admin\AdminController@updata');//执行修改
Route::get('/admin/destroy/{admin_id?}','Admin\AdminController@destroy');//删除
Route::get('/loginout','Admin\AdminController@loginout');//退出登录
});


//登录
Route::get('/login','Admin\AdminController@login');//登录
Route::get('/logindo','Admin\AdminController@logindo');//执行登录
Route::get('/getCaptcha','Admin\AdminController@getCaptcha')->name('getCaptcha');//验证码



//权限管理
Route::get('/menu/create','Admin\MenuController@create')->name('menu.create');
Route::post('/menu/store','Admin\MenuController@store');
Route::any('/menu','Admin\MenuController@index')->name('menu');
Route::post('/menu/check_name','Admin\MenuController@check_name');
Route::get('/menu/destroy/{id?}','Admin\MenuController@destroy');
Route::get('/menu/edit/{id}','Admin\MenuController@edit');
Route::post('/menu/update/{id}','Admin\MenuController@update');
