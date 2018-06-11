@extends('layouts.default')
@section('title', '关于')
@section('content')
    <a style="margin: 30px auto;" class="lead text-center center-block" href="">项目地址：https://github.com/Nick233333/l</a>
    <ul class="list-group">
        <li class="list-group-item list-group-item-success">运行环境</li>
        <li class="list-group-item">laravel 5.5</li>
        <li class="list-group-item">php7+</li>
        <li class="list-group-item">nginx1.10+</li>
        <li class="list-group-item">mysql5.7+</li>
        <li class="list-group-item">redis4.0+</li>
        <li class="list-group-item">node10+</li>
        <li class="list-group-item">composer</li>
    </ul>
    <ul class="list-group">
        <li class="list-group-item list-group-item-info">主要功能</li>
        <li class="list-group-item">注册登录功能</li>
        <li class="list-group-item">验证邮箱重置密码功能</li>
        <li class="list-group-item">权限功能</li>
        <li class="list-group-item">发布动态</li>
        <li class="list-group-item">用户列表</li>
        <li class="list-group-item">关注与取消关注</li>
        <li class="list-group-item">粉丝关系</li>
        <li class="list-group-item">发布次数限制与分页</li>
    </ul>
@stop