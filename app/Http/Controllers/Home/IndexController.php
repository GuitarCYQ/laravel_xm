<?php

namespace App\Http\Controllers\Home;

use App\Model\Banner;
use App\Model\Cases;
use App\Model\Friend;
use App\Model\Product;
use App\Model\Banneritem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        //获取banner
        $banners = Banner::where('entitle', '=', 'indexbanner')->first();
        //获取产品
        $product = Product::OrderBy('created_at',"Desc")->OrderBy('id',"Desc")->where('tuijian','=',1)->take(4)->get();
        //获取案例
        $cases = Cases::OrderBy('created_at',"Desc")->OrderBy('id',"Desc")->OrderBy('sort',"Desc")->take(4)->get();
        return view('home.index.index')->with('banners',$banners)->with('product',$product)->with('cases',$cases);
    }
}
