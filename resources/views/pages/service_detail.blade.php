@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_service_detail) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $service_detail->name }}</h1>
            </div>
        </div>
    </div>

    <div class="single-service-area pt_50 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-9 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-content mt_30">
                        <div class="service-photo-item">
                            <img src="{{ asset('uploads/'.$service_detail->photo) }}" alt="">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="service-details headstyle mt_30">
                                    <p>
                                        {!! clean($service_detail->description) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.2s">
                    <div class="service-sidebar mt_30">
                        <div class="service-widget service-list headstyle">
                            <h4>{{ ALL_SERVICES }}</h4>
                            <ul>
                                @foreach($service_items as $row)
                                <li class=""><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
