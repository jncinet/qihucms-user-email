@extends('layouts.wap')

@section('title', __('userEmail::auth.reset_password'))

@section('styles')
    <style>
        input {
            line-height: 2.6rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="container bg-white pb-3">
        <div class="pt-4 pb-4 pl-1 font-size-18">
            @lang('userEmail::auth.reset_password')
        </div>
        @error('mobile')
        <div class="alert alert-danger font-size-14" role="alert">
            {{ $message }}
        </div>
        @enderror
        @error('password')
        <div class="alert alert-danger font-size-14" role="alert">
            {{ $message }}
        </div>
        @enderror
        @error('captcha')
        <div class="alert alert-danger font-size-14" role="alert">
            {{ $message }}
        </div>
        @enderror
        <form method="post">
            @csrf
            <div class="d-flex align-items-center qh-border-bottom mb-3 px-1 pb-2">
                <i class="iconfont icon-shouye font-size-18"></i>
                <label class="flex-grow-1 ml-2">
                    <input
                        class="border-0 bg-transparent"
                        type="email"
                        autofocus
                        name="mobile"
                        id="mobile"
                        value="{{ old('mobile') }}"
                        placeholder='@lang('userEmail::auth.binding_account')'
                        required="required"/>
                </label>
            </div>
            <div class="d-flex align-items-center qh-border-bottom mb-3 px-1 pb-2">
                <i class="iconfont icon-yanzhengma font-size-18 mr-2"></i>
                <label class="flex-grow-1 mx-2">
                    <input
                        class="border-0 bg-transparent"
                        type="number"
                        name="captcha"
                        maxLength=6
                        placeholder='@lang('userEmail::auth.verify_code')'
                        required
                    />
                </label>
                <div class="p-2" id="sendCaptcha">
                    @lang('userEmail::auth.send_code')
                </div>
            </div>
            <div class="d-flex align-items-center qh-border-bottom mb-3 px-1 pb-2">
                <i class="iconfont font-size-18 icon-mima"></i>
                <label class="flex-grow-1 mx-2">
                    <input
                        class="border-0 bg-transparent"
                        type="password"
                        placeholder="@lang('userEmail::auth.new_password')"
                        name="password"
                        required
                    />
                </label>
            </div>
            <div class="d-flex align-items-center qh-border-bottom mb-3 px-1 pb-2">
                <i class="iconfont font-size-18 icon-mima"></i>
                <label class="flex-grow-1 mx-2">
                    <input
                        class="border-0 bg-transparent"
                        type="password"
                        name="password_confirmation"
                        placeholder="@lang('userEmail::auth.new_password_tip')"
                        required
                    />
                </label>
            </div>
            <button type="submit" class="btn btn-block qh-btn-rounded btn-primary mb-3">
                @lang('userEmail::auth.reset_login_password')
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        let t = 0, c;

        // 秒后再次发送
        $('#sendCaptcha').on('click', function () {
            if (t > 0) return;
            t = 60;
            const mobile = $('#mobile').val();
            if (!(/^1[3456789]\d{9}$/.test(mobile))) {
                $.toast("@lang('userEmail::auth.username_failed')", 'text');
                return false;
            }
            axios.post('{{ route('api.sms.reset_password') }}', {mobile})
                .then(function (response) {
                    $.toast("@lang('userEmail::auth.sent_successfully')",);
                    updateSendCaptchaText();
                })
                .catch(function (error) {
                    $.toast("@lang('userEmail::auth.sent_failed')", 'cancel');
                    $('#sendCaptcha').text("@lang('userEmail::auth.send_code')");
                    clearInterval(c);
                    t = 0;
                    // console.log(error);
                });
        });

        function updateSendCaptchaText() {
            c = setInterval(function () {
                if (t < 1) {
                    $('#sendCaptcha').text("@lang('userEmail::auth.send_code')");
                    clearInterval(c);
                    t = 0;
                } else {
                    $('#sendCaptcha').text(t + "@lang('userEmail::auth.send_again')");
                    t--;
                }
            }, 1000)
        }
    </script>
@endpush
