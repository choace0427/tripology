@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_blog_detail) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $blog_detail->blog_title }}</h1>
            </div>
        </div>
    </div>

    <div class="single-blog-area pt_50 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="single-blog mt_30">
                        <div class="blog-image mb_30">
                            <img src="{{ asset('uploads/'.$blog_detail->blog_photo) }}" alt="Blog Image">
                            <div class="date">
                                <h3>{{ \Carbon\Carbon::parse($blog_detail->created_at)->format('d') }}</h3>
                                <h4>
                                    {{ \Carbon\Carbon::parse($blog_detail->created_at)->format('M') }}
                                </h4>
                            </div>
                        </div>
                        <h3>{{ $blog_detail->blog_title }}</h3>
                        <ul>
                            <li><b>{{ CATEGORY_COLON }}</b> <a href="{{ url('category/'.$blog_detail->category_slug) }}">{{ $blog_detail->category_name }}</a></li>
                        </ul>

                        {!!  clean($blog_detail->blog_content) !!}

                        <h3 class="mt-4">{{ SHARE_NOW }}</h3>
                        <div class="share_buttons">
                            <a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u={{ url('blog/'.$blog_detail->blog_slug) }}&t={{ $blog_detail->blog_title }}"><i class="fab fa-facebook-f"></i></a>

                            <a class="twitter" target="_blank" href="https://twitter.com/share?text={{ $blog_detail->blog_title }}&url={{ url('blog/'.$blog_detail->blog_slug) }}"><i class="fab fa-twitter"></i></a>

                            <a class="pinterest" target="_blank" href="https://www.pinterest.com/pin/create/button/?description={{ $blog_detail->blog_title }}&media=&url={{ url('blog/'.$blog_detail->blog_slug) }}"><i class="fab fa-pinterest"></i></a>

                            <a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{ url('blog/'.$blog_detail->blog_slug) }}&title={{ $blog_detail->blog_title }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>


                    </div>

                    @if($blog_detail->comment_show == 'Yes')
                    <div class="comment-list headstyle mt_30 wow fadeIn" data-wow-delay="0.1s">
                        <h3>{{ COMMENTS }}</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fb-comments" data-href="{{ url('blog/'.$blog_detail->blog_slug) }}" data-width="" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

                @include('layouts.sidebar_blog')

            </div>
        </div>
    </div>


@endsection
