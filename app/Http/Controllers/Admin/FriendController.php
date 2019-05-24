<?php

namespace App\Http\Controllers\Admin;

use App\Model\Friend;
use App\Http\Requests\StoreFriendPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = Friend::OrderBy("sort","Desc")->OrderBy("id","Desc")->get();
        return view('admin.friend.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.friend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreFriendPost $request)
    {
        $friendModel = new Friend();
        $friendModel->title = $request->title;
        $friendModel->url = $request->url;
        $friendModel->sort = $request->sort;
        $friendModel->key = $request->key;
        $friendModel->save();
        return redirect(route('admin.friend.index'));
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
    public function edit(Friend $friend)
    {
        return view('admin.friend.edit')->with('friend',$friend);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoreFriendPost $request, $id)
    {
        $friendModel = Friend::find($id);
        $friendModel->title = $request->title;
        $friendModel->url = $request->url;
        $friendModel->sort = $request->sort;
        $friendModel->key = $request->key;
        $friendModel->save();
        return redirect(route('admin.friend.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Friend $friend)
    {
        $friend->delete();
        return redirect(route('admin.friend.index'));
    }
}
