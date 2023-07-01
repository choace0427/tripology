@php
    $about_page_data = DB::table('page_about_items')->where('id', 1)->first();
    $service_page_data = DB::table('page_service_items')->where('id', 1)->first();
    $team_page_data = DB::table('page_team_items')->where('id', 1)->first();
    $faq_page_data = DB::table('page_faq_items')->where('id', 1)->first();
    $blog_page_data = DB::table('page_blog_items')->where('id', 1)->first();
    $contact_page_data = DB::table('page_contact_items')->where('id', 1)->first();
    $testimonial_page_data = DB::table('page_testimonial_items')->where('id', 1)->first();
    $destination_page_data = DB::table('page_destination_items')->where('id', 1)->first();
    $package_page_data = DB::table('page_package_items')->where('id', 1)->first();
    $dynamic_pages = DB::table('dynamic_pages')->orderby('id', 'asc')->get();
@endphp

@if($dynamic_pages)
    @php $d_page_stat = 'Found';  @endphp
@else
    @php $d_page_stat = 'Not Found';  @endphp
@endif

<!-- <div class="menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('uploads/logo.png') }}" alt="Logo"></a>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="nav-wrapper main-menu">
                    <nav>
                        <ul class="sf-menu" id="menu">

                            <li><a href="{{ url('/') }}">{{ HOME }}</a></li>

                            @if($service_page_data->status == 'Show')
                            <li><a href="{{ route('front.services') }}">{{ SERVICES }}</a></li>
                            @endif

                            @if($destination_page_data->status == 'Show')
                            <li><a href="{{ route('front.destination') }}">{{ DESTINATIONS }}</a></li>
                            @endif

                            @if($package_page_data->status == 'Show')
                                <li><a href="{{ route('front.package') }}">{{ PACKAGES }}</a></li>
                            @endif

                            @if($about_page_data->status == 'Show' || $team_page_data->status == 'Show' || $testimonial_page_data->status == 'Show' || $faq_page_data->status == 'Show' || $d_page_stat == 'Found')
                            <li class="menu-item-has-children"><a href="javascript:void;">{{ PAGES }}</a>
                                <ul>

                                    @if($about_page_data->status == 'Show')
                                        <li><a href="{{ route('front.about') }}">{{ ABOUT_US }}</a></li>
                                    @endif

                                    @if($team_page_data->status == 'Show')
                                    <li><a href="{{ route('front.team_members') }}">{{ OUR_TEAM }}</a></li>
                                    @endif

                                    @if($testimonial_page_data->status == 'Show')
                                    <li><a href="{{ route('front.testimonial') }}">{{ TESTIMONIAL }}</a></li>
                                    @endif

                                    @if($faq_page_data->status == 'Show')
                                    <li><a href="{{ route('front.faq') }}">{{ FAQ }}</a></li>
                                    @endif

                                    @foreach($dynamic_pages as $row)
                                    <li><a href="{{ url('page/'.$row->dynamic_page_slug) }}">{{ $row->dynamic_page_name }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            @endif

                            @if($blog_page_data->status == 'Show')
                            <li><a href="{{ route('front.blogs') }}">{{ BLOG }}</a></li>
                            @endif

                            @if($contact_page_data->status == 'Show')
                            <li><a href="{{ route('front.contact') }}">{{ CONTACT }}</a></li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg p-0">
                        <div class="container-fluid">
                          <a class="navbar-brand p-0" href="/"><img src="{{ asset('images/logo-removebg.png') }}" class="w-75" alt=""></a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                              <li class="nav-item destination-dropdown">
                                <a class="nav-link" aria-current="page" href="{{ route('front.destination') }}">Destinations</a>
                                <ul class="destination-dropdown-menu">
                                    <span class="dropdown-heading">Destinations</span>
                                    <li class="dropdown-list">
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    </li>
                                </ul>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Adventure Styles</a>
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Contact</a>
                              </li>

                            </ul>
                           
                            <form class="d-flex" role="search">
                              <div class="input">
                              @if(session('traveller_id'))
                                    @php
                                        $traveller_name = explode(' ',session('traveller_name'));
                                    @endphp
                                    <a href="{{url('traveller/quotes')}}">{{$traveller_name[0]}} </a>
                                    <button class="" onClick="window.location.href = '{{route('traveller.logout')}}'" type="button">Logout</button>
                                @else
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Operator
                                    </a>
                                        <ul class="dropdown-menu header-dropdown" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" data-url="{{url('admin/login')}}">Operator</a></li>
                                            <li><a class="dropdown-item" data-url="{{url('traveller/login')}}">Traveller</a></li>
                                        </ul>
                                        
                                </div>
                                <button class="login_action" onClick="window.open('{{url('admin/login')}}')" type="button">Login</button>
                                @endif
                                   <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                              </div>
                            </form>
                          </div>
                        </div>
                      </nav>
                </div>
            </div>
        </div>
    </div>