@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_privacy) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $privacy->name }}</h1>
            </div>
        </div>
    </div>

    <div class="about-area pt_30 pb_50">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-text mt_30">
                        {!! clean($privacy->detail) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
