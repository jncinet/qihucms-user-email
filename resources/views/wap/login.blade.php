<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('userEmail::auth.login_page')</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <link rel="stylesheet" href="{{asset('/black/base.css')}}">
    <style>
        .msg {
            margin: 0 20px;
            padding: 10px;
            background: #2c353d;
            font-size: 14px;
            color: #999999;
            border-radius: 10px;
        }

        .pt-5px {
            padding-top: 5px;
        }
    </style>
</head>

<body ontouchstart class="bui-main">
<div class="bui-max-width">
    <div class="bui-login-header">
        <a href="javascript:;history.back()">
            <div></div>
            <h1>@lang('userEmail::auth.login')</h1>
        </a>
    </div>
    @error('username')
    <div class="msg">{{ $message }}</div>
    @enderror
    <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <input type="hidden" name="remember">
        <div class="bui-form">
            <div class="bui-form-cell">
                <label class="bui-form-label-input pt-5px">
                    <input
                        class="bui-form-input"
                        type="email"
                        name="username"
                        value="{{ old('username') }}"
                        required
                        placeholder='@lang('userEmail::auth.username_tip')'
                    />
                </label>
                @error('username')
                <div class="bui-form-icon bui-flex-center">
                    <i class="weui-icon-warn"></i>
                </div>
                @enderror
            </div>
            <div class="bui-form-cell">
                <label class="bui-form-label-input pt-5px">
                    <input
                        class="bui-form-input"
                        type="password"
                        name="password"
                        required
                        placeholder="@lang('userEmail::auth.password')"
                    />
                </label>
                @error('password')
                <div class="bui-form-icon bui-flex-center">
                    <i class="weui-icon-warn"></i>
                </div>
                @enderror
            </div>
            <div class="bui-login-forgot">
                <a href="{{ route('auth.wap.find_password') }}">
                    @lang('userEmail::auth.forgot_password')?
                </a>
            </div>
            <div class="bui-form-button-area">
                <button type="submit" class="bui-button-pink">
                    @lang('userEmail::auth.login')
                </button>
            </div>
        </div>
    </form>
    <div class="bui-footer" style="position:inherit;width:100%">
        @lang('userEmail::auth.not_account')?
        <a href="{{ route('auth.wap.register') }}">
            @lang('userEmail::auth.register')
        </a>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
</body>
</html>
