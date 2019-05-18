@extends('admin.default');
@section("title","案例管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            <a href="{{route('admin.case.create')}}" class="btn btn-success btn-xs">添加案例</a>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">案例管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">案例列表</li>
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
                        <form action="{{route('admin.case.destroy',['id'=>0])}}" method="post">
                            @csrf
                            @method("DELETE ")
                            <input type="submit" value="批量删除" class="btn btn-danger btn-lg">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:45px;">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="ischecked">
                                            </label>
                                        </div>
                                    </th>
                                    <th class="text-center" style="width: 60px;">ID</th>
                                    <th>名称</th>
                                    <th class="text-center" style="width:165px;">发布时间</th>
                                    <th class="text-center" style="width:150px;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check form-check-danger">
                                                <label class="form-check-label">
                                                    <input class="form-check-input mychecked" name="ids[]" value="{{ $item->id }}" type="checkbox">
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td class="text-center">{{ $item->created_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" href="{{ route('admin.case.edit',['case'=>$item->id]) }}" role="button">编辑</a>
                                            <a class="btn btn-danger btn-xs" href="javascript:;" onclick="dosubmit({{$item->id}})" role="button">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                        <div style="padding:10px 0;">
                            {{ $list->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset(__ADMIN__) }}/js/misc.js?v={{time()}}"></script>
    <script>
        function dosubmit(id){
            var src="/admin/case/"+id;
            document.getElementById("myform").action = src;
            document.getElementById("myform").submit();
        }
    </script>
@endsection
