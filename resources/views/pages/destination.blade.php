@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_destination) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $destination->name }}</h1>
            </div>
        </div>
    </div>

    <div class="portfolio-page pt_50 pb_80">
        <div class="container wow fadeIn">

            <div class="row">
                <div class="col-md-12">
                    {!! clean($destination->detail) !!}
                </div>
            </div>

            <div class="row">

                @foreach($destinations as $row)
                <div class="col-md-4 col-xs-6 clear-three wow fadeIn">
                    <div class="portfolio-item mt_30">
                        <div class="portfolio-bg"></div>
                        <img src="{{ asset('uploads/'.$row->d_photo) }}" alt="">
                        <div class="portfolio-text">
                            <a href="{{ asset('uploads/'.$row->d_photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                    <div class="photo-title">
                        <a href="{{ url('destination/'.$row->d_slug) }}">{{ $row->d_name }}</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
