@extends('layouts.wap_no_header')

@section('title', __("new_auth.Account Binding Instruction"))


@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75" style="transform: translateY(-20%)">
            <div class="w-50 mx-auto mb-3">
                <img class="img-fluid w-100" src="{{ Storage::url(cache('config_site_logo_wap')) }}" alt="SITE LOGO">
            </div>
            <div>
                <a href="{{ route('auth.wap.login.account') }}" class="btn btn-block btn-primary">@lang("new_auth.Already have an account, log in and bind")</a>
                <a href="{{ route('auth.wap.register') }}" class="btn btn-block btn-success">@lang("new_auth.No account, register a new account")</a>
                <div class="text-center text-secondary font-size-12 pt-2">@lang("new_auth.Reminder: It needs to be operated for the first use, and will not be selected again in the future")</div>
            </div>
        </div>
    </div>
@endsection
