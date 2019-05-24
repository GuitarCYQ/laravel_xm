@extends('admin.default');
@section("title","轮播图管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            轮播图管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">轮播图管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">添加轮播图</li>
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
                    @if(session()->has("errormsg"))
                            <div class="alert alert-danger">
                                {{ session("errormsg") }}
                            </div>
                     @endif
                    <form class="forms-sample" action="{{route('admin.banneritem.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pid">所属Banner</label>
                            <select class="form-control" name="banner_id" id="pid">
                                <option value="0">=======请选择Banner======</option>
                                @foreach($banners as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">名称</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="请输入名称">
                        </div>
                        <div class="form-group">
                            <label for="digest">摘要</label>
                            <input type="text" name="digest" class="form-control" id="digest" placeholder="请输入摘要">
                        </div>
                        <div class="form-group">
                            <label>图片上传</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="图片上传">
                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort">排序</label>
                            <input type="text" name="sort" value="100" class="form-control" id="sort" placeholder="请输入排序">
                        </div>
                        <div class="form-group">
                            <label for="sort">显示/隐藏</label>
                            <div class="form-check form-check-success">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="isshow" value="1" checked="">
                                    显示
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){
            var ue = UE.getEditor('contents', {
                autoHeight: false,
                initialFrameHeight:300,
                initialFrameWidth:850,
            });
        },1000)
    </script>
@endsection