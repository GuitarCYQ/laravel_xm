<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CheckCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::getcates();
        return view('admin.category.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CheckCategory $request)
    {
        if ($request->isMethod('POST')) {
            $category = new Category;
            $category->name = $request->name;
            $category->pid = $request->pid;
            $category->sort = $request->sort;
            $result = $category->save();
            return redirect(route('admin.category.list'));
        }

        $cates = Category::getcates();
        return view('admin.category.create')->with('cates',$cates);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckCategory $request, Category $category)
    {
        if ($request->isMethod('POST')) {
            $category->name = $request->name;
            $category->pid = $request->pid;
            $category->sort = $request->sort;
            $result = $category->save();
            return redirect(route('admin.category.list'));
        }

        $cates = Category::getcates();
        return view('admin.category.edit')->with("case",$category)->with('cates',$cates);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $cate)
    {
        $result = $cate->delete();
        return redirect(route('admin.category.list'));
    }
}
