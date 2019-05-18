<?php

namespace App\Http\Controllers\Admin;

use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewsPost;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //渲染列表页面
        $list =News::orderBy('created_at','Desc')->paginate(10);
        return view("admin.news.index")->with('list',$list);
    }

    //百度推送
    public function baidusend(News $news){
        //
        $url = route('index.news.show',['news'=>$news->id]);
        // $url = "http://www.yfketang.cn/course-show/9.html";
        $result = Baidu::getInstance()->baidusend([$url]);
        checkreturn($result,"推送");
        return redirect(route('admin.news.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //渲染新闻添加页面
        return view("admin.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsPost $request)
    {
        $NewsModel = new News;
        $NewsModel->title = $request->title;
        $NewsModel->keyword = $request->keyword;
        $NewsModel->desc = $request->desc;
        $NewsModel->remark = $request->remark;
        $NewsModel->views = $request->views;
        $NewsModel->content = $request->contents;
        if($request->file("file")){
            $NewsModel->pic = $request->file('file')->store('news');
        }

         // 获取通过验证的数据...
        $validated = $request->validated();

        $NewsModel->save();
        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view("admin.news.edit")->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data =[
            'title'=>$request->title,
            'keyword'=>$request->keyword,
            'desc'=>$request->desc,
            'remark'=>$request->remark,
            'views'=>$request->views,
            'content'=>$request->contents,
        ];
        if($request->file("file")){
            $data['pic'] = $request->file('file')->store('news');
            //删除旧图片
            Storage::delete($news->pic);
        }
        $NewsModel = new News;
        $result = $NewsModel::where('id','=',$news->id)->update($data); 
        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
