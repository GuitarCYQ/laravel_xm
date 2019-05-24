@extends('admin.default');
@section("title","轮播图管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            <a href="{{route('admin.banneritem.create')}}" class="btn btn-danger btn-sm">添加轮播图</a>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">轮播图管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">轮播图列表</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if(session()->has("data"))
                        <div class="alert alert-{{session("data")['class']}}">
                            {{ session('data')['msg'] }}
                        </div>
                    @endif
                        <form action={} method="POST" id="myform">
                            @csrf
                            @method("DELETE")
                        </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 60px;">ID</th>
                                <th>名称</th>
                                <th>所属banner</th>
                                <th class="text-center" style="width:150px;">图片</th>
                                <th class="text-center" style="width: 150px;">排序</th>
                                <th class="text-center" style="width: 120px;">显示/隐藏</th>
                                <th class="text-center" style="width:150px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ isset($item->banners->title)?$item->banners->title:"" }}</td>
                                <td class="text-center"><img src="/uploads/{{ $item->pic }}" height="45" alt=""></td>
                                <td class="text-center">
                                    <input type="text" class="form-control setsort" data-id="{{$item->id}}" value="{{ $item->sort }}" style="width: 80px;">
                                </td>
                                <td class="text-center">{{ $item->isshow }}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="{{ route('admin.banneritem.edit',['banner'=>$item->id]) }}" role="button">编辑</a>
                                    <a class="btn btn-danger btn-xs" onclick="dosubmit({{$item->id}})" role="button">删除</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function dosubmit(id){
            var src="/admin/banneritem/"+id;
            document.getElementById("myform").action = src;
            document.getElementById("myform").submit();
        }
    </script>
@endsection