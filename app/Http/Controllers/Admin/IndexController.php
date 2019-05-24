<?php

namespace App\Http\Controllers\Admin;

use App\Model\Cases;
use App\Model\News;
use App\Model\Product;
use App\Model\Spiderbot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        //文章数、产品数、案例数
        $newscount = News::count();
        $productcount = Product::count();
        $casescount = Cases::count();
        //蜘蛛来访
        $spider = Spiderbot::all();
        return view("admin.index.index")->with('newscount',$newscount)->with('productcount',$productcount)->with('casescount',$casescount)->with('spider',$spider);
    }

}
