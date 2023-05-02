@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_forget_password) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ RESET_PASSWORD }}</h1>
            </div>
        </div>
    </div>

    <div class="login-area bg-area pt_80 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="mx-auto w-400">
                    <div class="login-form">
                        <form action="{{ route('traveller.forget_password.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group mb-3">
                                    <label for="">{{ EMAIL_ADDRESS }}</label>
                                    <input type="text" class="form-control" name="traveller_email">
                                </div>
                                
                                @if($g_setting->google_recaptcha_status == 'Show')
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                </div>
                                @endif

                                <button type="submit" class="btn btn-primary" name="form1">{{ SUBMIT }}</button>
                                <div class="mt_10">
                                    <a href="{{ route('traveller.login') }}">{{ BACK_TO_LOGIN_PAGE }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection