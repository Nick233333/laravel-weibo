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
            @include('shared._messages')
            @yield('content')
            @include('layouts._footer')
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('js')
</body>
</html>