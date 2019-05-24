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

use Illuminate\Http\Request;

Route::name("index.")->group(function(){
    Route::get("/","Home\IndexController@index")->name('home');
    Route::get('/cases','Home\CasesController@index')->name("cases.list");
});

//后台
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function  ()  {
    Route::get('/',  "Admin\IndexController@index")->name('home');
    Route::get('/index',  "Admin\IndexController@index")->name('home');

    //站点配置
	Route::group(['prefix'  =>  'config'],  function  ()  {  //prefix:前缀
	    Route::get("/site","Admin\ConfigController@siteconfig")->name("config.siteconfig");
	    Route::get("/info","Admin\ConfigController@information")->name("config.information");
	    Route::get("/baidu","Admin\ConfigController@baidu")->name("config.baidu");
	    Route::post("/store","Admin\ConfigController@store")->name("config.store");
	});

	//新闻
	Route::resource("/news","Admin\NewsController")->except(['destroy','create']);
	Route::get("/add","Admin\NewsController@create")->name('news.create');
	Route::get('/news/{news}/del','Admin\NewsController@destroy')->name("news.delete");
	Route::get('/news/baidusend/{news}','Admin\NewsController@baidusend')->name("news.baidusend");


	//产品分类
	Route::group(['prefix'  => 'category'],  function(){
		Route::get("/","Admin\CategoryController@index")->name("category.list");
		Route::match(['get','post'],"/create","Admin\CategoryController@create")->name("category.create");
		Route::match(['get','post'],"/edit/{category}","Admin\CategoryController@edit")->name("category.edit");
		Route::get("delete/{case}","Admin\CategoryController@destroy")->name("category.delete");
	});

	//产品管理
	Route::resource("/product","Admin\ProductController")->except(['show']);

	//案例模块
    Route::resource("/case","Admin\CaseController")->except(['show']);

    //单页管理
    Route::resource("/page","Admin\PageController")->except(['show','destory']);
    Route::group(['prefix' => 'page'], function (){
        Route::get("/createzx","Admin\PageController@createzx")->name("page.createzx");
        Route::get("/createlc","Admin\PageController@createlc")->name("page.createlc");
        Route::get("/licheng","Admin\PageController@licheng")->name("page.licheng");
        Route::get("/editlc/{page}","Admin\PageController@editlc")->name('page.editlc');
		Route::get("/editzx/{page}","Admin\PageController@editzx")->name('page.editzx');
    });

    //轮播图模块
    Route::resource("/banner","Admin\BannerController")->except(['show']);

    //轮播图分类
    Route::resource("/banneritem","Admin\BanneritemController")->except(['show']);
    Route::post('/banneritem/setsort',"Admin\BanneritemController@setsort")->name('banneritem.setsort');

    //友情链接
    Route::resource("/friend","Admin\FriendController")->except(['show']);

    //Login
    Route::get("/login","Admin\LoginController@login")->name('login.login');
	
	//图片上传
//    Route::post('/upload','Admin\IndexController@imgupload')->name("upload");

});
//后台登录
Route::get('admin/login','Admin\LoginController@login')->name('admin.login.login');
Route::post('admin/dologin','Admin\LoginController@dologin')->name('admin.login.dologin');




