@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_registration) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ TRAVELLER_REGISTRATION }}</h1>
            </div>
        </div>
    </div>


    <div class="login-area bg-area pt_80 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="mx-auto w-550">
                    <div class="regiser-form sell-form">
                        <form action="{{ route('traveller.registration.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group mb-3">
                                    <label for="">{{ NAME }} *</label>
                                    <input type="text" class="form-control" name="traveller_name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ EMAIL_ADDRESS }} *</label>
                                    <input type="email" class="form-control" name="traveller_email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ PASSWORD }} *</label>
                                    <input type="password" class="form-control" name="traveller_password">
                                </div>

                                @if($g_setting->google_recaptcha_status == 'Show')
                                <div class="form-group mb-3">
                                    <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                </div>
                                @endif

                                <button type="submit" class="btn btn-primary">{{ MAKE_REGISTRATION }}</button>
                                <div class="new-user mt_10">
                                    <a href="{{ route('traveller.login') }}">{{ EXISTING_USER_GO_TO_LOGIN }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
