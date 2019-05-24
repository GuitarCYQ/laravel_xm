<?php

namespace App\Providers;

use App\Model\Friend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Validator::extend('Checkbannerid', function ($attribute, $value, $parameters, $validator) {
            return $value>0;
        });
        //获取系统配置信息
        $config = $this->getConfig();
        //获取友情连接
        $friends = $this->getFriend();
        View::share('config',$config);
        View::share('friends',$friends);
    }

    //获取系统配置信息
    private function getConfig(){
        $config = DB::table('config')->get();
        $arr =[];
        foreach ($config as $item){
            $arr[$item->name] = json_decode($item->config);
        }
        return $arr;
    }
    //获取友情连接
    private function getFriend(){
        //获取友情连接
        $friends = Friend::OrderBy('created_at','Desc')->OrderBy("id",'Desc')->OrderBy('sort','Desc')->get();
        return $friends;
    }
}
