<?php

namespace App\Http\Controllers\Admin;

use App\Model\Banner;
use App\Model\Banneritem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBanneritemPost;
use App\Http\Requests\StorePagePost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class BanneritemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = Banneritem::OrderBy("sort","Desc")->OrderBy("id","Desc")->get();
        return view('admin.banneritem.index')->with("list",$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $banners = Banner::all();
        return view("admin.banneritem.create")->with("banners",$banners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreBanneritemPost $request)
    {
        $BanneritemModel = new Banneritem();
        $BanneritemModel->banner_id = $request->banner_id;
        $BanneritemModel->title = $request->title;
        $BanneritemModel->digest = $request->digest;
        $BanneritemModel->sort = $request->sort;
        $BanneritemModel->isshow = isset($request->isshow)?$request->isshow:0;
        if($request->file("file")){
            $BanneritemModel->pic = $request->file('file')->store('banner');
        }
        if($BanneritemModel->pic==""){
//            Session::flash('errormsg',"图片不能为空");
            $request->session()->flash('errormsg',"图片不能为空");
            return redirect()->back();
        }
        $BanneritemModel->save();
        return redirect(route('admin.banneritem.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Banneritem $banneritem)
    {
        $banners = Banner::all();
        return view('admin.banneritem.edit')->with("banneritem",$banneritem)->with("banners",$banners);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoreBanneritemPost $request, $id)
    {
        $BanneritemModel = Banneritem::find($id);
        $BanneritemModel->banner_id = $request->banner_id;
        $BanneritemModel->title = $request->title;
        $BanneritemModel->digest = $request->digest;
        $BanneritemModel->sort = $request->sort;
        $BanneritemModel->isshow = isset($request->isshow)?$request->isshow:0;
        if($request->file("file")){
            $BanneritemModel->pic = $request->file('file')->store('banner');
        }
        $BanneritemModel->save();
        return redirect(route('admin.banneritem.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Banneritem $banneritem)
    {
        $banneritem->delete();
        return redirect(route('admin.banneritem.index'));
    }

    //    排序
    public function setsort(Request $request){
        if($request->isMethod("POST")){
            $BanneritmeModel = Banneritem::find($request->id);
            $BanneritmeModel->sort=$request->sort;
            $result = $BanneritmeModel->save();
        }
        if($result>0){
            return ['code'=>1,'msg'=>'操作成功'];
        }else{
            return ['code'=>0,'msg'=>'操作失败'];
        }
    }
}
