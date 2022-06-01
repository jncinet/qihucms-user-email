<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('userEmail::auth.register')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <link rel="stylesheet" href="{{asset('black/base.css')}}">
    <script>
        if (!window.Promise) {
            document.writeln('<script src="https://as.alipayobjects.com/g/component/es6-promise/3.2.2/es6-promise.min.js"' + '>' + '<' + '/' + 'script>');
        }
        window.wap_url = "{{ config('qihu.wap_url') }}";
        window.api_url = "{{ config('qihu.api_url') }}";
    </script>
    <style>
        .msg {
            margin: 0 20px;
            padding: 10px;
            background: #2c353d;
            font-size: 14px;
            color: #999999;
            border-radius: 10px;
        }
    </style>
</head>
<body ontouchstart class="bui-main">
<div class="bui-max-width">
    <div class="bui-login-header">
        <a href="javascript:history.back()">
            <div></div>
            <h1>@lang("new_auth.Sign Up")</h1>
        </a>
    </div>
    @error('username')
    <div class="msg">{{ $message }}</div>
    @enderror
    @error('password')
    <div class="msg">{{ $message }}</div>
    @enderror
    @error('captcha')
    <div class="msg">{{ $message }}</div>
    @enderror
    @error('iagree')
    <div class="msg">{{ $message }}</div>
    @enderror
    <form method="post">
        @csrf
        <div class="bui-form">
            @if(cache('config_user_type'))
                <div class="bui-form-cell">
                    <label class="bui-form-label-input">
                        <span class="bui-form-label">Mobile</span>
                        <input class="bui-form-input" type="text" autoFocus name="username" id="username"
                               value="{{ old('username') }}"
                               required="required" placeholder="Please enter your mobile."/>
                    </label>
                    @error('username')
                    <div class="bui-form-icon bui-flex-center">
                        <i class="weui-icon-warn"></i>
                    </div>
                    @enderror
                </div>
                <div class="bui-form-cell">
                    <label class="bui-form-label-input">
                        <span class="bui-form-label">Captcha</span>
                        <input class="bui-form-input" type="number" name="captcha" value="" maxLength=6
                               required="required" placeholder="Please enter captcha."/>
                    </label>
                    <div id="sendCaptcha" class="bui-flex-center"
                         style="height:40px;margin-top:10px;font-size:12px;color:#999999;background:#111827;padding:0 8px;border-radius:10px">
                        Send captcha
                    </div>
                </div>
            @else
                <div class="bui-form-cell">
                    <label class="bui-form-label-input">
                        <span class="bui-form-label">@lang("new_auth.Username")</span>
                        <input class="bui-form-input" type="text" autoFocus name="username" id="username"
                               value="{{ old('username') }}"
                               required="required" placeholder='@lang('new_auth.Please enter your username')'/>
                    </label>
                    @error('username')
                    <div class="bui-form-icon bui-flex-center">
                        <i class="weui-icon-warn"></i>
                    </div>
                    @enderror
                </div>
            @endif
            <div class="bui-form-cell">
                <label class="bui-form-label-input">
                    <span class="bui-form-label">@lang("new_auth.Password")</span>
                    <input class="bui-form-input" type="password"
                           placeholder='@lang('new_auth.Please enter your password')' name="password"
                           value="" required="required"/>
                </label>
                @error('password')
                <div class="bui-form-icon bui-flex-center">
                    <i class="weui-icon-warn"></i>
                </div>
                @enderror
            </div>
            <div class="bui-form-cell">
                <label class="bui-form-label-input">
                    <span class="bui-form-label">@lang("new_auth.Confirm password")</span>
                    <input class="bui-form-input" type="password" name="password_confirmation"
                           value="" placeholder='@lang('new_auth.Please confirm your password')' required="required"/>
                </label>
            </div>
            @empty($spreadCode)
                <div id="spreadCode" class="bui-form-cell">
                    <label class="bui-form-label-input">
                        <span class="bui-form-label">@lang("new_auth.Invitation Code")</span>
                        <input class="bui-form-input" id="spread_code"
                               type="text" name="spread_code" value="{{ old('spread_code') }}"
                               maxlength=8 placeholder='@lang('new_auth.Optional')'/>
                    </label>
                </div>
            @endempty
            <div class="bui-form-cell">
                <div class="form-check mb-3 pl-0" style="color:#999999;font-size:14px">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="iagree" required/>
                        @lang("new_auth.Read and agree")</label><br/>
                    <a href="{{ cache('config_register_agreement_url') }}" style="color:#BB559A">
                        @lang("new_auth.Member registration agreement")
                    </a>
                    <br/>
                    <a href="{{ cache('config_privacy_policy_url') }}" style="color:#BB559A">
                        @lang("new_auth.Privacy Policy")
                    </a>
                </div>
            </div>
            <div class="bui-form-button-area">
                <button type="submit" class="bui-button-pink">
                    @lang('userEmail::auth.register')
                </button>
            </div>
        </div>
    </form>
    <div style="font-size: 14px;color: #999999;text-align: center;" class="bui-max-width">
        @lang('userEmail::auth.already_account')?
        <a href="{{url('login')}}" style="color:#BB559A">
            @lang('userEmail::auth.login')
        </a>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
<script>
    let t = 0, c;
    // 判断节点是否存在
    if (document.getElementById("spreadCode")) {
        // 读取缓存推广员
        const spreadCode = window.sessionStorage.getItem('spreadCode');
        if (typeof spreadCode === 'string' && spreadCode.length > 3) {
            $('#spreadCode').hide();
            $('#spread_code').val(spreadCode);
        }
    }

    // 秒后再次发送
    $('#sendCaptcha').on('click', function () {
        console.log(123456);
        if (t > 0) return;
        t = 60;
        const username = $('#username').val();
        if (!(/^1[3456789]\d{9}$/.test(username))) {
            $.toast("The mobile phone number is incorrect.", 'text');
            return false;
        }
        axios.post('{{ route('api.sms.register') }}', {username})
            .then(function (response) {
                $.toast('Send success');
                updateSendCaptchaText();
            })
            .catch(function (error) {
                if (error.response.status === 422) {
                    const errors = error.response.data.errors;
                    let msg;
                    for (var i in errors) {
                        msg = errors[i]
                    }
                    $.toast(msg, 'text');
                } else {
                    $.toast('Send fail', 'cancel');
                }
                clearInterval(c);
                $('#sendCaptcha').text('Sended');
                t = 0;
            });
    });

    function updateSendCaptchaText() {
        c = setInterval(function () {
            if (t < 1) {
                $('#sendCaptcha').text('Send captcha');
                clearInterval(c);
                t = 0;
            } else {
                $('#sendCaptcha').text(t + ' seconds');
                t--;
            }
        }, 1000)
    }
</script>
</html>
