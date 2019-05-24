<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cases;
use App\Http\Requests\StoreCasesPost;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = Cases::OrderBy('sort',"Desc")->OrderBy('id',"Desc")->paginate(10);
        return view('admin.case.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.case.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreCasesPost $request)
    {
        $CaseModel = new Cases;
        $CaseModel->title = $request->title;
        $CaseModel->remark = $request->remark;
        $CaseModel->sort = $request->sort;
        if($request->file("file")){
            $CaseModel->pic = $request->file('file')->store('cases');
        }
        $CaseModel->save();
        return redirect(route("admin.case.index"));
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
    public function edit(Cases $case)
    {
        return view("admin.case.edit")->with('cases',$case);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoreCasesPost $request, $id)
    {
        $CasesModel = Cases::find($id);
        $CasesModel->title = $request->title;
        $CasesModel->remark = $request->remark;
        $CasesModel->sort = $request->sort;
        if($request->file("file")){
            $CasesModel->pic = $request->file('file')->store('cases');
            //删除旧图片
            Storage::delete($request->pic);
        }
        $CasesModel->save();
        return redirect(route("admin.case.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request,$id)
    {
        $ids=[];
        if ($id != 0){
            $ids[] = $id;
        }
        else {
            if ($request->has('ids')) {
                $ids = $request->ids;
            }
        }
        $counts = Cases::destroy($ids);
        return redirect(route("admin.case.index"));
    }

}
