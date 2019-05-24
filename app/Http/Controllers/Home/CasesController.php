<?php

namespace App\Http\Controllers\Home;

use App\Model\Banner;
use App\Model\Cases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CasesController extends Controller
{
    protected $banner;

    public function __construct()
    {
        //获取banner
        $banner = Banner::where('entitle','=','cases')->first();
        $this->banner = $banner->banneritem[0];
    }
    //列表
    public function index(){
        $list = Cases::OrderBy('sort','Desc')->OrderBy('created_at','Desc')->OrderBy('id','Desc')->paginate(6);
        return view('home.cases.index')->with('list',$list)->with('banners',$this->banner);
    }
}
