@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_search) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ SEARCH_BY_COLON }} {{ $search_string }}</h1>
            </div>
        </div>
    </div>

    <div class="blog-area pt_50 pb_80">
        <div class="container wow fadeIn">

            <div class="row">

                @if(count($blog_items) == 0)
                    <div class="text-danger">{{ NO_RESULT_FOUND }}</div>
                @else

                @foreach($blog_items as $row)
                    <div class="col-md-4 col-xs-6 clear-three wow fadeIn" data-wow-delay="0.6s">
                        <div class="blog-item mt_30">
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
                                <ul>
                                    <li><b>{{ CATEGORY_COLON }}</b> <a href="{{ url('category/'.$row->category_slug) }}">{{ $row->category_name }}</a></li>
                                </ul>
                                <p>
                                    {!! clean(nl2br($row->blog_content_short)) !!}
                                </p>
                                <div class="button mt_15">
                                    <a href="{{ url('blog/'.$row->blog_slug) }}">{{ READ_MORE }} <i class="fa fa-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @endif

            </div>
        </div>
    </div>

@endsection
