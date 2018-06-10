@extends('layouts.default')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
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