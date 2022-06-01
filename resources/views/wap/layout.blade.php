<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ cache('config_site_name') }}</title>
    <script src="//at.alicdn.com/t/font_1542353_6tfnwyzrub.js"></script>
    <script src="//as.alipayobjects.com/g/component/fastclick/1.0.6/fastclick.js"></script>
    <script>
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function () {
                FastClick.attach(document.body);
            }, false);
        }
        if (!window.Promise) {
            document.writeln('<script src="https://as.alipayobjects.com/g/component/es6-promise/3.2.2/es6-promise.min.js"' + '>' + '<' + '/' + 'script>');
        }
        window.wap_url = "{{ config('qihu.wap_url') }}";
        window.api_url = "{{ config('qihu.api_url') }}";
    </script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<header class="d-flex bg-light qh-nav-bar qh-border-bottom">
    @section('headerLeftContent')
        <a class="px-3 text-secondary" href="javascript:window.history.back();">
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-houtuishangyige"></use>
            </svg>
        </a>
    @show
    <div class="flex-grow-1 text-center font-size-16">@yield('title')</div>
    @yield('headerRightContent')
</header>
<div class="container">
    @yield('content')
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</html>
