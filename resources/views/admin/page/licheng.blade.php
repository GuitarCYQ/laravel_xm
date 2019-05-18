@extends('admin.default');
@section("title","发展历程管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            <a href="{{route('admin.page.createlc')}}" class="btn btn-danger btn-sm">添加历程</a>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">发展历程</a></li>
                <li class="breadcrumb-item active" aria-current="page">发展历程列表</li>
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
                                <th class="text-center">ID</th>
                                <th>时间</th>
                                <th class="text-center">发布时间</th>
                                <th class="text-center" style="width:150px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-success btn-xs" href="{{ route('admin.page.editlc',['page'=>$item->id]) }}" role="button">编辑</a>
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
            var src="/admin/page/"+id;
            document.getElementById("myform").action = src;
            document.getElementById("myform").submit();
        }
    </script>
@endsection