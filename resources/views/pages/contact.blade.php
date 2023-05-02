@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_contact) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $contact->name }}</h1>
            </div>
        </div>
    </div>

    <div class="contact-area bg-area pt_50 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12">
                    {!! clean($contact->detail) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 mt_30 wow fadeIn" data-wow-delay="0.1s">
                    <div class="contact-form">
                        <div class="headstyle">
                            <h4>{{ CONTACT_FORM }}</h4>
                        </div>
                        <form action="{{ route('front.contact_form') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="{{ NAME }}" name="visitor_name">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="{{ PHONE }}" name="visitor_phone">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="{{ EMAIL_ADDRESS }}" name="visitor_email">
                                </div>
                                <div class="form-group mb-3">
                                    <textarea class="form-control" placeholder="{{ MESSAGE }}" name="visitor_message"></textarea>
                                </div>
                                @if($g_setting->google_recaptcha_status == 'Show')
                                <div class="form-group mb-3">
                                    <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                </div>
                                @endif
                                <button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 mt_30 wow fadeIn" data-wow-delay="0.1s">
                    <div class="headstyle">
                        <h4>{{ CONTACT_INFORMATION }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
                            <div class="contact-item mb_30">
                                <div class="contact-text">
                                    <h3>{{ ADDRESS }}</h3>
                                    <p>
                                        {!! clean(nl2br($contact->contact_address)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="contact-item mb_30">
                                <div class="contact-text">
                                    <h3>{{ EMAIL_ADDRESS }}</h3>
                                    <p>
                                        {!! clean(nl2br($contact->contact_email)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.4s">
                            <div class="contact-item mb_30">
                                <div class="contact-text">
                                    <h3>{{ PHONE }}</h3>
                                    <p>
                                        {!! clean(nl2br($contact->contact_phone)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt_50 wow fadeIn">
                    <div class="map-area">
                        <div class="headstyle">
                            <h4>{{ ADDRESS_IN_MAP }}</h4>
                        </div>
                        {!! $contact->contact_map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
