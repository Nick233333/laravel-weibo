
<header class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand hidden-sm" href="{{ route('home') }}" id="logo">Sample App</a>
        </div>
        <div class="navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="#">登录</a></li>
                <li><a href="{{ route('signup') }}">注册</a></li>
                <li><a href="{{ route('help') }}">帮助</a></li>
                <li><a href="{{ route('about') }}">关于</a></li>
            </ul>
        </div>
    </div>
</header>