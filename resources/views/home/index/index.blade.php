@extends('home.default')
@section("title",$config['siteconfig']->sitetitle)
@section("keyword",$config['siteconfig']->keyword)
@section("desc",$config['siteconfig']->desc)
@section('content')
    <!-- banner部分 -->
    <div>
        <div class="layui-carousel" id="banner">
            <div carousel-item>
{{--                @foreach($banners->banneritem as $v)--}}
{{--                    <div>--}}
{{--                        <img src="/uploads/{{$v->pic}}">--}}
{{--                        <div class="panel">--}}
{{--                            <p class="title">{{$v->title}}</p>--}}
{{--                            <p>{{$v->digest}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
    <!-- main部分 -->
    <div class="main-product">
        <div class="layui-container">
            <p class="title">专为前端而研制的<span>核心产品</span></p>
            <div class="layui-row layui-col-space25">
                @foreach($product as $k=>$p)
                    <div class="layui-col-sm6 layui-col-md3">
                        <div class="content">
                            <div><img src="{{ asset(__INDEX__) }}/res/static/img/Big_icon{{$k+1}}.png" alt="{{$p->alt}}"></div>
                            <div>
                                <p class="label">{{$p->title}}</p>
                                <p>{{$p->remark}}</p>
                            </div>
                            <a href="{{route('index.product.show',['product'=>$p->id])}}">查看产品 ></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="main-service">
        <div class="layui-container">
            <p class="title">为客户打造完美的<span>客户案例</span></p>
            <div class="layui-row layui-col-space25 layui-col-space80">
                @foreach($cases as $c)
                    <div class="layui-col-sm6">
                        <div class="content">
                            <div class="content-left"><img src="/uploads/{{$c->pic}}"></div>
                            <div class="content-right">
                                <p class="label">{{$c->title}}</p>
                                <span></span>
                                <p>{{$c->remark}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="service-more"><a href="">查看更多</a></div>
        </div>
    </div>
@endsection