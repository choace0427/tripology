@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_destination_detail) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $destination_detail->d_name }}</h1>
            </div>
        </div>
    </div>

    <div class="country-package pt_80 pb_80">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <div class="country-text">
                        <h2>{{ $destination_detail->d_heading }}</h2>
                        <p>
                            {!! clean(nl2br($destination_detail->d_short_description)) !!}
                        </p>
                        <div class="country-social mt_30 tac">
                            <h3>{{ SHARE_NOW }}</h3>
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-page pt_40 pb_80 bg-area">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-headline">
                        <div class="headline">
                            <h2>{{ $destination_detail->d_package_heading }}</h2>
                        </div>
                        <p>{{ $destination_detail->d_package_subheading }}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($packages as $row)
                    <div class="col-md-4 col-xs-6 clear-three wow fadeIn">
                        <div class="portfolio-item mt_30">
                            <div class="portfolio-bg"></div>
                            <img src="{{ asset('uploads/'.$row->p_photo) }}" alt="">
                            <div class="portfolio-text">
                                <a href="{{ asset('uploads/'.$row->p_photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-title">
                            <a href="{{ url('package/'.$row->p_slug) }}">
                                {{ $row->p_name }}<br>
                                <span class="fz_22"><i class="{{ $g_setting->currency_sign }}"></i> {{ $row->p_price }} / {{ PERSON }}</span>
                                @php
                                $last_booking_date = \Carbon\Carbon::parse($row->p_last_booking_date)->format('Y-m-d');
                                $today_date = \Carbon\Carbon::parse(date('Y-m-d'))->format('Y-m-d');
                                @endphp

                                @if($last_booking_date<$today_date)
                                    <br><span class="not-available-red">({{ NOT_AVAILABLE_FOR_BOOKING }})</span>
                                @else
                                    <br><span class="available-green">({{ AVAILABLE_FOR_BOOKING }})</span>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="package-tabarea pt_80 pb_80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-headline">
                        <div class="headline">
                            <h2>{{ $destination_detail->d_detail_heading }}</h2>
                        </div>
                        <p>{{ $destination_detail->d_detail_subheading }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt_30">
                <div class="d-flex align-items-start pack-tab">
                    <div class="nav flex-column nav-pills me-4 pack-tab-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">{{ INTRODUCTION }}</button>
                        <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">{{ EXPERIENCE }}</button>
                        <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">{{ WEATHER }}</button>
                        <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">{{ HOTEL }}</button>
                        <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">{{ TRANSPORTATION }}</button>
                        <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">{{ CULTURE }}</button>
                    </div>
                    <div class="tab-content pack-tab-right" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                            {!! clean($destination_detail->d_introduction) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                            {!! clean($destination_detail->d_experience) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                            {!! clean($destination_detail->d_weather) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                            {!! clean($destination_detail->d_hotel) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                            {!! clean($destination_detail->d_transportation) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                            {!! clean($destination_detail->d_culture) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
