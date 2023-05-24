<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    @php
    $url = Request::path();
    $conName = explode('/',$url);
    if(!isset($conName[1]))
    {
        $conName[1] = '';
    }
    if(!isset($conName[2]))
    {
        $conName[2] = '';
    }
    if(!isset($conName[3]))
    {
        $conName[3] = '';
    }
    @endphp

    @if($conName[0] == '')
    @php
        $item_row = DB::table('page_home_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'about')
    @php
        $item_row = DB::table('page_about_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'services')
    @php
        $item_row = DB::table('page_service_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'blog' && $conName[1]=='' && $conName[2]=='')
    @php
        $item_row = DB::table('page_blog_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'faq')
    @php
        $item_row = DB::table('page_faq_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'team-members' && $conName[1] == '' && $conName[2] == '')
    @php
        $item_row = DB::table('page_team_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'testimonial')
    @php
        $item_row = DB::table('page_testimonial_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'destination' && $conName[1] == '' && $conName[2] == '')
    @php
        $item_row = DB::table('page_destination_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'package' && $conName[1] == '' && $conName[2] == '')
    @php
        $item_row = DB::table('page_package_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'contact')
    @php
        $item_row = DB::table('page_contact_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'terms-and-conditions')
    @php
        $item_row = DB::table('page_term_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'privacy-policy')
    @php
        $item_row = DB::table('page_privacy_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'search')
    @php
        $item_row = DB::table('page_other_items')->where('id',1)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'traveller' && $conName[1] == 'login')
    @php
        $item_row = DB::table('page_other_items')->where('id',4)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'traveller' && $conName[1] == 'register')
    @php
        $item_row = DB::table('page_other_items')->where('id',5)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'traveller' && $conName[1] == 'forget-password')
    @php
        $item_row = DB::table('page_other_items')->where('id',6)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'traveller' && ($conName[1] == 'dashboard' || $conName[1] == 'order' || $conName[1] == 'profile-change' || $conName[1] == 'password-change') )
    @php
        $item_row = DB::table('page_other_items')->where('id',7)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'package' && $conName[1] == 'store' && $conName[2] == 'list')
    @php
        $item_row = DB::table('page_other_items')->where('id',8)->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'service' && $conName[1]!='')
    @php
        $item_row = DB::table('services')->where('slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'destination' && $conName[1]!='')
    @php
        $item_row = DB::table('destinations')->where('d_slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'package' && $conName[1]!='' && $conName[2]=='')
    @php
    $item_row = DB::table('packages')->where('p_slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'team-member' && $conName[1]!='')
    @php
    $item_row = DB::table('team_members')->where('slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'blog' && $conName[1]!='')
    @php
    $item_row = DB::table('blogs')->where('blog_slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>
        <meta property="og:title" content="{{ $item_row->blog_title }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('front.blog_detail', $item_row->blog_slug) }}">
        <meta property="og:description" content="{{ $item_row->blog_content_short }}">
        <meta property="og:image" content="{{ asset('uploads/'.$item_row->blog_photo) }}">

    @elseif($conName[0] == 'page' && $conName[1]!='')
    @php
    $item_row = DB::table('dynamic_pages')->where('dynamic_page_slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @elseif($conName[0] == 'category' && $conName[1]!='')
    @php
    $item_row = DB::table('categories')->where('category_slug',$conName[1])->first();
    @endphp
        <meta name="description" content="{{ $item_row->seo_meta_description }}">
        <title>{{ $item_row->seo_title }}</title>

    @endif

    <link rel="icon" type="image/png" href="{{ asset('uploads/'.$g_setting->favicon) }}">

    @include('layouts.styles')


    @if($g_setting->cookie_consent_status == 'Show')
    <script src="https://cdn.websitepolicies.io/lib/cookieconsent/1.0.3/cookieconsent.min.js" defer></script><script>window.addEventListener("load",function(){window.wpcc.init({"colors":{"popup":{"background":"#{{ $g_setting->cookie_consent_bg_color }}","text":"#{{ $g_setting->cookie_consent_text_color }}","border":"#b3d0e4"},"button":{"background":"#{{ $g_setting->cookie_consent_button_bg_color }}","text":"#{{ $g_setting->cookie_consent_button_text_color }}"}},"position":"bottom","padding":"large","margin":"none","content":{"message":"{{ $g_setting->cookie_consent_message }}","button":"{{ $g_setting->cookie_consent_button_text }}"}})});</script>
    @endif


    @if($g_setting->google_analytic_status == 'Show')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $g_setting->google_analytic_tracking_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ $g_setting->google_analytic_tracking_id }}');
    </script>
    @endif

    <!--style>
        .top-header,
        .sf-menu > li > a:before,
        .sf-menu li ul > li,
        .text-animated li a,
        .slide-carousel .owl-nav .owl-prev, 
        .slide-carousel .owl-nav .owl-next,
        .service-item:before,
        .featured-item .price,
        .featured-carousel .owl-dots .owl-dot.active,
        .photo-title a:hover,
        .button a,
        .team-text,
        .testimonial-gallery .owl-dots .owl-dot.active,
        .blog-carousel .owl-nav .owl-prev, 
        .blog-carousel .owl-nav .owl-next,
        .blog-image .date,
        .newsletter-submit input[type='submit'],
        .footer-item ul.footer-social li a,
        .scroll-top,
        .headstyle h4:before,
        .headstyle h4:after,
        .service-list ul li a:hover,
        .pack-tab-left .nav-link.active,
        .button-booking button,
        .packmoreinfo-tab-top .nav-link.active,
        .team-detail-photo ul li a,
        .testi-page-carousel .owl-dots .owl-dot.active,
        .sidebar-item button,
        .sidebar-item h3:before,
        .sidebar-item h3:after,
        .contact-item,
        .btn-primary,
        .option-board ul li a:hover {
            background: {{ '#'.$g_setting->theme_color }}!important;
        }

        .sf-menu li:hover > a, .sf-menu li.current_page_item a,
        .text-animated h1,
        .featured-text h4 a:hover,
        .blog-item a.b-head:hover,
        .footer-item ul li a:hover,
        .pack-tab-left .nav-link,
        .packmoreinfo-tab-top .nav-link,
        .team-detail-text li i,
        .faq-page .accordion-button:not(.collapsed),
        .sidebar-item ul li a:hover,
        .sidebar-item ul li:hover a:before,
        .single-blog ul li a,
        .blog-text ul li a:hover,
        a.forget-password-link,
        .new-user a:hover {
            color: {{ '#'.$g_setting->theme_color }}!important;
        }

        .text-animated li a,
        .footer-item ul.footer-social li a,
        .footer-item ul.footer-social li a:hover,
        .sidebar-item button,
        .sidebar-item input:focus,
        .form-group input:focus, 
        .form-group textarea:focus,
        .btn-primary {
            border-color: {{ '#'.$g_setting->theme_color }}!important;
        }

        .sf-arrows > li:hover > .sf-with-ul:after, 
        .sf-arrows > li.current_page_item > .sf-with-ul:after {
            border-top-color: {{ '#'.$g_setting->theme_color }}!important;
        }
        
        .sf-menu li:hover li > a,
        .footer-item ul.footer-social li a,
        .footer-item ul.footer-social li a:hover,
        .pack-tab-left .nav-link.active,
        .packmoreinfo-tab-top .nav-link.active {
            color: #fff!important;
        }

        .footer-item ul.footer-social li a:hover {
            background: transparent!important;
        }

        .button a:hover,
        .team-text:hover,
        .blog-carousel .owl-nav .owl-prev:hover,
        .blog-carousel .owl-nav .owl-next:hover,
        .newsletter-submit input[type='submit']:hover,
        .text-animated li a:hover,
        .team-detail-photo ul li a:hover,
        .sidebar-item button:hover,
        .contact-item:hover,
        .btn-primary:hover {
            background: #333!important;
        }

        .text-animated li a:hover,
        .sidebar-item button:hover,
        .btn-primary:hover {
            border-color: #333!important;   
        }

        .wpcc-container {
            z-index: 20000000000!important;
        }

        .wpcc-container .wpcc-message a.wpcc-privacy {
            display: none!important;
        }

    </style-->


</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    @if($g_setting->preloader_status == 'Show')
    <div id="preloader">
        <div id="status" style="background-image: url({{ asset('uploads/'.$g_setting->preloader_photo) }})"></div>
    </div>
    @endif

    <!-- <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-8">
                    <div class="top-header-left">
                        <p><i class="fas fa-phone"></i>{{ $g_setting->top_bar_phone }}</p>
                        <p><i class="far fa-envelope"></i>{{ $g_setting->top_bar_email }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-4">
                    <div class="top-header-right">
                        
                        @if(!session()->get('traveller_id'))
                        <a href="{{ route('traveller.registration') }}"><i class="fas fa-user-plus"></i>{{ REGISTRATION }}</a>
                        <a href="{{ route('traveller.login') }}"><i class="fas fa-lock"></i>{{ LOGIN }}</a>
                        @endif

                        @if(session()->get('traveller_id'))
                        <a href="{{ route('traveller.dashboard') }}"><i class="fab fa-chrome"></i>{{ DASHBOARD }}</a>
                        @endif

                    </div>
                </div>
            </div>
        </div> -->
        @if(isset($top_notification))
        <div class="bg come2">
            <div class="container">
                <div class="row  mt-2">
                    <div class="col-md-12">
                    <div class="row">
                            <div class="col-md-3 come pe-0 text-end">
                            <img src="{{ asset('images/flagus logo.png') }}" alt="">
                        </div>
                        <div class="col-md-9 come pt-2">
                        <h6 class="m-auto">{!! $top_notification->notification_message !!}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>    
        @endif
    @include('layouts.nav')

    @yield('content')

    <!-- @if($page_home_items->newsletter_status == 'Show')
    <div class="newsletter-area pt_120 pb_120" style="background-image: url({{ asset('uploads/'.$page_home_items->newsletter_bg) }})">
        <div class="newsletter-bg"></div>
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col">
                    <div class="main-headline white">
                        <div class="headline">
                            <h2>{{ $page_home_items->newsletter_title }}</h2>
                        </div>
                        <p>
                            {{ $page_home_items->newsletter_text }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt_30 wow fadeIn" data-wow-delay="0.2s">
                    <form action="{{ route('front.subscription') }}" method="post">
                        @csrf
                        <div class="newsletter-submit">
                            <input type="text" placeholder="{{ EMAIL_ADDRESS }}" name="subs_email">
                            <input type="submit" value="{{ SUBMIT }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif -->

    <!-- <div class="footer-area pt_50 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-3 col-sm-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="footer-item mt_30">
                        <h3>{{ $g_setting->footer_column1_heading }}</h3>
                        <ul>
                            @php $i=0; @endphp
                            @foreach($featured_packages as $row)
                                @php
                                    $i++;
                                @endphp
                                @if($i>$g_setting->footer_column1_total_item)
                                    @break
                                @endif
                                <li><a href="{{ route('front.package_detail', $row->p_slug) }}">{{ $row->p_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="footer-item mt_30">
                        <h3>{{ $g_setting->footer_column2_heading }}</h3>
                        <ul>
                            @php $i=0; @endphp
                            @foreach($recent_packages as $row)
                                @php
                                    $i++;
                                @endphp
                                @if($i>$g_setting->footer_column2_total_item)
                                    @break
                                @endif
                                <li><a href="{{ route('front.package_detail', $row->p_slug) }}">{{ $row->p_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                    <div class="footer-item mt_30">
                        <h3>{{ $g_setting->footer_column3_heading }}</h3>
                        <ul>
                            @php $i=0; @endphp
                            @foreach($recent_posts as $row)
                                @php
                                    $i++;
                                @endphp
                                @if($i>$g_setting->footer_column3_total_item)
                                    @break
                                @endif
                                <li><a href="{{ route('front.blog_detail', $row->blog_slug) }}">{{ $row->blog_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="footer-item mt_30">
                        <h3>{{ $g_setting->footer_column4_heading }}</h3>
                        <div class="footer-address-item">
                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="text"><span>{!! clean(nl2br($g_setting->footer_address)) !!}</span></div>
                        </div>
                        <div class="footer-address-item">
                            <div class="icon"><i class="fas fa-phone-volume"></i></div>
                            <div class="text"><span>{!! clean(nl2br($g_setting->footer_phone)) !!}</span></div>
                        </div>
                        <div class="footer-address-item">
                            <div class="icon"><i class="far fa-envelope"></i></div>
                            <div class="text"><span>{!! clean(nl2br($g_setting->footer_email)) !!}</span></div>
                        </div>

                        @if($social_media_items)
                        <ul class="footer-social">
                            @foreach($social_media_items as $row)
                                <li><a href="{{ $row->social_url }}" target="_blank"><i class="{{ $row->social_icon }}"></i></a></li>
                            @endforeach
                        </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-text">
                        <p>{{ $g_setting->footer_copyright }}</p>
                    </div>

                    @if($term_page_data->status == 'Show' || $privacy_page_data->status == 'Show')
                
                    <div class="footer-bottom-menu">
                        <ul>
                            @if($term_page_data->status == 'Show')
                            <li><a href="{{ route('front.term') }}">{{ TERM_AND_CONDITIONS }}</a></li>
                            @endif

                            @if($privacy_page_data->status == 'Show')
                            <li><a href="{{ route('front.privacy') }}">{{ PRIVACY_POLICY }}</a></li>
                            @endif

                        </ul>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div> -->
    <div class="bg-last mt-5 py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="last-logo">
              <img src="{{ asset('images/logo-3.png') }}" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="last-logo">
              <h3>Destinations</h3>
              <ul class="ps-0">
                @php
                    $destinations = DB::table('destinations')->get();
                @endphp
                @foreach($destinations as $destination)
                    <li><a href="#">{{ $destination->d_name }}</a></li>
                @endforeach
              </ul>
              <h3>Destinations</h3>
              <a href="#">Last Minute Deals</a>
            </div>
          </div>


          <div class="col-md-3">
            <div class="last-logo">
              <h3>About</h3>
              <ul class="ps-0">
                <li><a href="#">About IWV</a></li>
                <li><a href="#">Flexible Travel</a></li>
                <li><a href="#">Travel Updates</a></li>
                <li><a href="#">Health & Safety</a></li>
                <li><a href="#">Traveler Reviews</a></li>
                <li><a href="#">On Your Trip</a></li>
                <li><a href="#">Before You Go</a></li>
                <li><a href="#">Travel Insurance</a></li>
                <li><a href="#">Contact us</a></li>
                
              </ul>
            </div>
          </div>

          <div class="col-md-4">
            <div class="last-logo">
            <form action="{{ route('subscribe') }}" method="post">
                @csrf
                    <h3>Our Newsletter</h3>
                    <p>Subscribe to our newsletter and get exlusive first minute offers straight into your inbox.</p>
                    <input type="text" class="input2" name="subs_email" value="{{ old('subs_email') }}" placeholder="Enter your email adders">
                    <ul class="ps-0 d-flex mt-2">
                    <li><a href="#">Join As:</a></li>
                        <li class="ps-2"><a href="#"><input type="radio" name="joining_as" value="travel_agent">Travel Agent</a></li>
                        <li class="ps-2"><a href="#"><input type="radio" name="joining_as" value="customer">Customer</a></li>
                    </ul>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-12">
            <div class="text-center">
              <h6>Travel Website @2023 All Right Reserved</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    @include('layouts.scripts_footer')

<!--
@if($g_setting->tawk_live_chat_status == 'Show')
    <div class="live-chat-container">
        {!! $g_setting->tawk_live_chat_code !!}
    </div>
@endif
-->
</body>

</html>
