@extends('home.default')
@section('title','客户案例')
@section('content')
    <!-- banner部分 -->
    <div class="banner product" style="background: url('/uploads/{{isset($banners->pic)?$banners->pic:""}}') no-repeat center top;background-size: cover;">
        <div class="title">
            <p>{{isset($banners->title)?$banners->title:""}}</p>
            <p class="en">{{isset($banners->digest)?$banners->digest:""}}</p>
        </div>
    </div>
    <!-- main部分 -->
    <div class="main-case">
        <div class="layui-container">
            <div class="layui-row">
                @foreach($list as $item)
                    <div class="layui-inline content">
                        <div class="layui-inline case-img"><img src="/uploads/{{$item->pic}}"></div>
                        <p class="lable">{{$item->title}}</p>
                        <p>{{$item->remark}}</p>
                    </div>
                @endforeach
            </div>
            <div id="casePage">{{$list->links('vendor.pagination.default')}}</div>
        </div>
    </div>
@endsection