@extends('layouts.default')
@section('css')
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css">
@stop
@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
                <section class="stats">
                    @include('shared._stats', ['user' => Auth::user()])
                </section>
                <div class="social-share text-center" style="margin-top: -25px;" data-initialized="true" data-wechat-qrcode-title="打开微信扫一扫">
                    <a href="#" class="social-share-icon icon-weibo"></a>
                    <a href="#" class="social-share-icon icon-qq"></a>
                    <a href="#" class="social-share-icon icon-qzone"></a>
                    <a href="#" class="social-share-icon icon-wechat"></a>
                    <a href="#" class="social-share-icon icon-facebook"></a>
                    <a href="#" class="social-share-icon icon-twitter"></a>
                </div>
            </aside>
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
                <h3>动态列表</h3>
                @include('shared._feed')
            </div>
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Laravel</h1>
            <p class="lead">Hello Code</p>
            <p>
                <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">注册</a>
            </p>
        </div>
    @endif
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/js/social-share.min.js"></script>
@stop