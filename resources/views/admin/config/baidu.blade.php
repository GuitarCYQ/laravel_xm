@extends('admin.default');
@section("title","系统配置")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            系统配置
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">系统配置</a></li>
                <li class="breadcrumb-item active" aria-current="page">百度推送</li>
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
                    @if(session()->has("data"))
                            <div class="alert alert-{{session("data")['class']}}">
                                {{ session('data')['msg'] }}
                            </div>
                     @endif

                    <form class="forms-sample" action="{{route('admin.config.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="baidu">
                        <input type="hidden" name="title" value="百度推送">
                        <div class="form-group">
                            <label for="domain">域名</label>
                            <input type="text" value="{{isset($config['domain'])?$config['domain']:''}}" name="domain" class="form-control" id="domain" placeholder="请输入域名">
                        </div>
                        <div class="form-group">
                            <label for="checkkey">百度验证</label>
                            <input type="text" value="{{isset($config['checkkey'])?$config['checkkey']:''}}" name="checkkey" class="form-control" id="checkkey" placeholder="请输入百度验证">
                        </div>
                        <div class="form-group">
                            <label for="key">百度密钥</label>
                            <input type="text" value="{{isset($config['key'])?$config['key']:''}}" name="key" class="form-control" id="key" placeholder="请输入百度密钥">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection