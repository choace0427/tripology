@extends('layouts.app')

@section('content')

<div class="slider">
    <div class="slide-carousel owl-carousel">

        @foreach($sliders as $row)
        <div class="slider-item" style="background-image:url({{ asset('uploads/'.$row->slider_photo) }});">
            <div class="slider-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 @if($g_setting->layout_direction == 'Right to Left') offset-md-5 @endif">
                        <div class="slider-table">
                            <div class="slider-text">

                                <div class="text-animated">
                                    <h1>{{ $row->slider_heading }}</h1>
                                </div>

                                <div class="text-animated">
                                    <p>
                                        {!! clean($row->slider_text) !!}
                                    </p>
                                </div>

                                <div class="text-animated">
                                    <ul>
                                        <li><a href="{{ $row->slider_button_url }}">{{ $row->slider_button_text }}</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


@if($page_home->service_status == 'Show')
<div class="service-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2>{{ $page_home->service_title }}</h2>
                    </div>
                    <p>{{ $page_home->service_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row">


            @foreach($services as $row)
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
    </div>
</div>
@endif


@if($page_home->featured_package_status == 'Show')
<div class="featured-package bg-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2>{{ $page_home->featured_package_title }}</h2>
                    </div>
                    <p>{{ $page_home->featured_package_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_50">
                <div class="featured-carousel owl-carousel">

                    @foreach($featured_packages as $row)
                    <div class="featured-item wow fadeIn" data-wow-delay="0.1s">
                        <div class="featured-photo left">
                            <img src="{{ asset('uploads/'.$row->p_photo) }}" alt="{{ $row->p_name }}">
                            <span class="price"><i class="{{ $g_setting->currency_sign }}"></i> {{ $row->p_price }} / {{ PERSON }}</span>
                        </div>
                        <div class="featured-text">
                            <h4><a href="{{ url('package/'.$row->p_slug) }}">{{ $row->p_name }}</a></h4>
                            <p>
                                {!! clean(nl2br($row->p_description_short)) !!}
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_home->counter_status == 'Show')
<div class="counterup-area pt_70 pb_100" style="background-image: url({{ asset('uploads/'.$page_home->counter_bg) }})">
    <div class="bg-counterup"></div>
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.1s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter">{{ $page_home->counter1_number }}</h2>
                        <h4>{{ $page_home->counter1_text }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.2s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter">{{ $page_home->counter2_number }}</h2>
                        <h4>{{ $page_home->counter2_text }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.3s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter">{{ $page_home->counter3_number }}</h2>
                        <h4>{{ $page_home->counter3_text }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.4s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter">{{ $page_home->counter4_number }}</h2>
                        <h4>{{ $page_home->counter4_text }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_home->destination_status == 'Show')
<div class="portfolio-page pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2>{{ $page_home->destination_title }}</h2>
                    </div>
                    <p>{{ $page_home->destination_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row mt_10">

            @php $i=0; @endphp
            @foreach($destinations as $row)
                @php $i++; @endphp
                @if($i>6)
                    @break
                @endif
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

        <div class="row mt_25">
            <div class="col align-self-center">
                <div class="button text-center">
                    <a href="{{ route('front.destination') }}">{{ SEE_ALL_DESTINATIONS }}</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endif


@if($page_home->team_member_status == 'Show')
<div class="team-area bg-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2>{{ $page_home->team_member_title }}</h2>
                    </div>
                    <p>{{ $page_home->team_member_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_30">
                <div class="team-carousel owl-carousel">

                    @foreach($team_members as $row)
                        <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-photo">
                                <div class="team-bg"></div>
                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="{{ $row->name }}">

                                @if($row->facebook != '' || $row->twitter != '' || $row->linkedin != '' || $row->youtube != '' || $row->instagram != '')
                                <div class="team-social">
                                    <ul>
                                        @if($row->facebook != '')
                                            <li><a href="{{ $row->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($row->twitter != '')
                                            <li><a href="{{ $row->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        @endif

                                        @if($row->linkedin != '')
                                            <li><a href="{{ $row->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if($row->youtube != '')
                                            <li><a href="{{ $row->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        @endif
                                        @if($row->instagram != '')
                                            <li><a href="{{ $row->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                @endif

                            </div>
                            <div class="team-text">
                                <a href="{{ url('team-member/'.$row->slug) }}">{{ $row->name }}</a>
                                <p>{{ $row->designation }}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->testimonial_status == 'Show')
<div class="testimonial-area pt_80 pb_80" style="background-image: url({{ asset('uploads/'.$page_home->testimonial_bg) }})">
    <div class="bg-testimonial"></div>
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline white">
                    <div class="headline">
                        <h2>{{ $page_home->testimonial_title }}</h2>
                    </div>
                    <p>{{ $page_home->testimonial_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_30">
                <div class="testimonial-gallery owl-carousel wow fadeIn" data-wow-delay="0.2s">

                    @foreach($testimonials as $row)
                        <div class="testimonial-item">
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
@endif


@if($page_home->latest_blog_status == 'Show')
<div class="blog-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2>{{ $page_home->latest_blog_title }}</h2>
                    </div>
                    <p>{{ $page_home->latest_blog_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_50">
                <div class="blog-carousel owl-carousel">

                    @foreach($blogs as $row)
                    <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                        <a href="{{ url('blog/'.$row->blog_slug) }}">
                            <div class="blog-image">
                                <img src="{{ asset('uploads/'.$row->blog_photo) }}" alt="Blog Image">
                                <div class="date">
                                    <h3>{{ \Carbon\Carbon::parse($row->created_at)->format('d') }}</h3>
                                    <h4>
                                        {{ \Carbon\Carbon::parse($row->created_at)->format('M') }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                        <div class="blog-text">
                            <a class="b-head" href="{{ url('blog/'.$row->blog_slug) }}">{{ $row->blog_title }}</a>
                            <p>
                                {!! clean(nl2br($row->blog_content_short)) !!}
                            </p>
                            <div class="button mt_15">
                                <a href="{{ url('blog/'.$row->blog_slug) }}">{{ READ_MORE }} <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->client_status == 'Show')
<div class="brand-area bg-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2>{{ $page_home->client_title }}</h2>
                    </div>
                    <p>{{ $page_home->client_subtitle }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_30">
                <div class="brand-carousel owl-carousel">

                    @foreach($clients as $row)
                    <div class="brand-item wow fadeIn" data-wow-delay="0.1s">

                        @if($row->url != '')
                            <a href="{{ $row->url }}" target="_blank">
                        @endif
                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                        @if($row->url != '')
                            </a>
                        @endif

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
