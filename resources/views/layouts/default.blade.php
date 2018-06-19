<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'l.hellocode.name') - l.hellocode.name - Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
    <link rel="shortcut icon" href="/favicon.png">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="Nick">
    <meta name="Keywords" content="php,laravel,vue,js,mysql,css,html5" />
    <meta name="Description" content="php,laravel,vue,js,mysql,css,html5信息。" />
    @yield('css')
</head>
<body>
    @include('layouts._header')
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <div id="loginMessage" class="alert alert-success alert-dismissible hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p id="message"></p>
            </div>
            @include('shared._messages')
            @yield('content')
            @include('layouts._footer')
        </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
    <script>
        var socket = io('http://123.207.8.94:2000');
        var is_login = '{{ session()->has('login') }}';
        var user = '{{ Auth::user()->name ?? ''}}';
        if (is_login) {
            // 触发服务端的 login 事件
            socket.emit('login', user);
        }

        socket.on('message', function(msg){
            if (msg !== user) {
                $('#message').text('欢迎 '+ msg +' 登录系统！');
                $('#loginMessage').removeClass('hidden');
            }
        });
    </script>
    @yield('js')
</body>
</html>