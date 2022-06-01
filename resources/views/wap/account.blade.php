@extends('layouts.wap')

@section('title', __('userEmail::auth.login_title'))

@section('header_title', __('userEmail::auth.login_title'))

@section('styles')
    <style>
        input {
            line-height: 2.6rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="container bg-white">
        <div class="py-4 pl-1 font-size-18">@lang('userEmail::auth.login_title')</div>
        @error('username')
        <div class="alert alert-danger font-size-14" role="alert">
            {{ $message }}
        </div>
        @enderror
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <input type="hidden" name="remember">
            <label class="d-flex align-items-center qh-border-bottom mb-3 px-1 pb-2">
                <i class="iconfont icon-shouye font-size-18"></i>
                <input
                    class="flex-grow-1 ml-2 border-0 bg-transparent"
                    type="email"
                    autofocus
                    placeholder='@lang('userEmail::auth.username_tip')'
                    name="username"
                    value="{{ old('username') }}"
                    aria-required="true"
                    required
                />
            </label>
            <div class="d-flex align-items-center qh-border-bottom mb-4 px-1 pb-2">
                <i class="iconfont icon-mima font-size-18"></i>
                <label class="flex-grow-1 mx-2">
                    <input
                        class="border-0 bg-transparent"
                        type="password"
                        id="password"
                        name="password"
                        value=""
                        placeholder='@lang('userEmail::auth.password')'
                        required
                    />
                </label>
                <i class="iconfont icon-xianshimima1 font-size-18"
                   aria-hidden="true" id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-block qh-btn-rounded btn-primary mb-3">
                @lang('userEmail::auth.login_now')
            </button>
            <div class="text-center">
                <a href="{{ route('auth.wap.find_password') }}"
                   class="text-black-50 font-size-14">@lang('userEmail::auth.forgot_password')?</a>
            </div>
            <label class="overflow-hidden m-0 p-0" style="width: 0;height:0;">
                <input type="checkbox" name="remember" value="1" checked>
                @lang('userEmail::auth.remember_password')
            </label>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#togglePassword').on('click', function () {
            if ($(this).hasClass("icon-xianshimima1")) {
                $(this).removeClass('icon-xianshimima1').addClass('icon-xianshimima');
                $(this).prev("input").attr('type', 'text');
            } else {
                $(this).removeClass('icon-xianshimima').addClass('icon-xianshimima1');
                $(this).prev("input").attr('type', 'password');
            }
        })
        // $.alert("自定义的消息内容");
    </script>
@endpush
