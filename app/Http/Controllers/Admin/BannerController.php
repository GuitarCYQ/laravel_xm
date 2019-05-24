<?php

namespace App\Http\Controllers\Admin;

use App\Model\Banner;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = Banner::all();
        return view("admin.banner.index")->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.banner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $BannerModel = new Banner();
        $BannerModel->title =$request->title;
        $BannerModel->entitle =$request->entitle;
        try{
            $BannerModel->save();
        }catch(Exception $e){
            $request->session()->flash('errormsg',$e->getMessage());
            return redirect()->back();
        }
        return redirect(route('admin.banner.index'));
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
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit')->with('banner',$banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->entitle = $request->entitle;
        $banner->save();
        return redirect(route('admin.banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect(route('admin.banner.index'));
    }
}
