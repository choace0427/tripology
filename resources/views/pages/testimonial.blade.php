@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_testimonial) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $testimonial->name }}</h1>
            </div>
        </div>
    </div>

    <div class="testimonial-page pt_80 pb_80">
        <div class="container wow fadeIn">

            <div class="row">
                <div class="col-md-12">
                    {!! clean($testimonial->detail) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt_30">
                    <div class="testi-page-carousel owl-carousel">

                        @foreach($testimonials as $row)
                        <div class="testimonial-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="testimonial-photo" style="background-image: url({{ asset('uploads/'.$row->photo) }})"></div>
                            <div class="testimonial-text">
                                <h2>{{ $row->name }}</h2>
                                <h3>{{ $row->designation }}</h3>
                                <div class="testimonial-pra">
                                    <p>
                                        {!! clean(nl2br($row->comment)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
