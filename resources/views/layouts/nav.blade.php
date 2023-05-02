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

<div class="menu-area">
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
</div>
