@extends('admin.default');
@section("title","友情连接管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            友情连接管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">友情连接管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">编辑友情连接</li>
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
                    <form class="forms-sample" action="{{route('admin.friend.update',['id'=>$friend->id])}}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">名称</label>
                            <input type="text" name="title" value="{{$friend->title}}" class="form-control" id="title" placeholder="请输入名称">
                        </div>
                        <div class="form-group">
                            <label for="url">网址</label>
                            <input type="text" name="url" value="{{$friend->url}}" class="form-control" id="url" placeholder="请输入网址">
                        </div>
                        <div class="form-group">
                            <label for="sort">排序</label>
                            <input type="text" name="sort" value="{{$friend->sort}}" class="form-control" id="sort" placeholder="请输入排序">
                        </div>
                        <div class="form-group">
                            <label for="key">关键字</label>
                            <input type="text" name="key" value="{{$friend->key}}" class="form-control" id="key" placeholder="请输入关键字">
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
                initialFrameHeight:300
            });
        },1000)
    </script>
@endsection