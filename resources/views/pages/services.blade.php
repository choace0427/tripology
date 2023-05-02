@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_service) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $service->name }}</h1>
            </div>
        </div>
    </div>

    <div class="service-area pt_50 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12">
                    {!! clean($service->detail) !!}
                </div>
            </div>

            <div class="row">

                @foreach($service_items as $row)
                <div class="col-md-4 col-xs-6 clear-three wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item mt_30" style="background-image: url({{ asset('uploads/'.$row->photo) }})">
                        <a href="{{ url('service/'.$row->slug) }}">
                            <i class="{{ $row->icon }}"></i>
                            <div class="ser-text">
                                <h4>{{ $row->name }}</h4>
                                <p>
                                    {!! clean(nl2br($row->short_description)) !!}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $service_items->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection
