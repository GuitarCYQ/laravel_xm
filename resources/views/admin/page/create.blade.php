@extends('admin.default');
@section("title","单页管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            单页管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">单页管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">公司简介</li>
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
                    <form class="forms-sample" action="{{route('admin.page.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="1">
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" value="{{isset($jianjie->title)?$jianjie->title:''}}" name="title" class="form-control" id="title" placeholder="请输入标题">
                        </div>
                        <div class="form-group">
                            <label for="remark">摘要</label>
                            <textarea class="form-control" name="remark" id="remark" rows="4" placeholder="请输入摘要">{{isset($jianjie->remark)?$jianjie->remark:''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>图片上传</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" value="{{isset($jianjie->pic)?$jianjie->pic:''}}" class="form-control file-upload-info" disabled="" placeholder="图片上传">
                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contents">详情</label>
                            {{--<textarea class="form-control" name="contents" id="contents" rows="4" praceholder="请输入新闻内容"></textarea>--}}
                            <script id="contents" name="contents" type="text/plain">{!! isset($jianjie->content)?$jianjie->content:''  !!}</script>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" id="ne1" charset="utf-8" src="{{ asset(__ADMIN__) }}/neditor/neditor.config.js?v={{time()}}"></script>
    <script type="text/javascript" id="ne2"  charset="utf-8" src="{{ asset(__ADMIN__) }}/neditor/neditor.all.min.js?v={{time()}}"> </script>
    <script type="text/javascript" id="ne3" charset="utf-8" src="{{ asset(__ADMIN__) }}/neditor/neditor.service.js?v={{time()}}"></script>
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