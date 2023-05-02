@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_package) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $package->name }}</h1>
            </div>
        </div>
    </div>

    <div class="portfolio-page pt_50 pb_80">
        <div class="container wow fadeIn">

            <div class="row">
                <div class="col-md-12">
                    {!! clean($package->detail) !!}
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
                            <a href="{{ route('front.package_detail', $row->p_slug) }}">
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

@endsection
