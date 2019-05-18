@extends('admin.default');
@section("title","发展历程")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            发展历程
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">发展历程</a></li>
                <li class="breadcrumb-item active" aria-current="page">添加历程</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <form class="forms-sample" action="{{route('admin.page.update',['page'=>$page->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="type" value="3">
                        <div class="form-group">
                            <label for="title">时间</label>
                            <input type="text" name="title" value="{{$page->title}}" class="form-control" id="title" placeholder="请输入时间">
                        </div>
                        <div class="form-group">
                            <label>图片上传</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" value="{{$page->pic}}" class="form-control file-upload-info" disabled="" placeholder="图片上传">
                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark">历程</label>
                            <textarea class="form-control" name="remark" id="remark" rows="4" praceholder="请输入历程">{{$page->remark}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection