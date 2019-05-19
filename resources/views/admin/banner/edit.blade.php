@extends('admin.default');
@section("title","Banner管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            Banner管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Banner管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">添加Banner</li>
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
                    <form class="forms-sample" action="{{route('admin.banner.update',['banner'=>$banner->id])}}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">名称</label>
                            <input type="text" name="title" value="{{$banner->title}}" class="form-control" id="title" placeholder="请输入名称">
                        </div>
                        <div class="form-group">
                            <label for="entitle">英文名称</label>
                            <input type="text" name="entitle" value="{{$banner->entitle}}"  class="form-control" id="entitle" placeholder="请输入英文名称">
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