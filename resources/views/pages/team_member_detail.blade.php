@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_team_member_detail) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $team_member_detail->name }}</h1>
            </div>
        </div>
    </div>

    <div class="team-detail pt_50 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-detail-photo mt_30">
                        <img src="{{ asset('uploads/'.$team_member_detail->photo) }}" alt="Team Photo">
                        <h4>{{ $team_member_detail->name }}</h4>
                        <span>{{ $team_member_detail->designation }}</span>

                        @if($team_member_detail->facebook != '' ||$team_member_detail->twitter != '' ||$team_member_detail->linkedin != '' ||$team_member_detail->youtube != '' ||$team_member_detail->instagram != '')
                        <ul>
                            @if($team_member_detail->facebook!='')
                                <li><a href="{{ $team_member_detail->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            @endif

                            @if($team_member_detail->twitter!='')
                                <li><a href="{{ $team_member_detail->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            @endif

                            @if($team_member_detail->linkedin!='')
                                <li><a href="{{ $team_member_detail->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            @endif

                            @if($team_member_detail->youtube!='')
                                <li><a href="{{ $team_member_detail->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            @endif

                            @if($team_member_detail->instagram!='')
                                <li><a href="{{ $team_member_detail->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            @endif
                        </ul>
                        @endif

                    </div>
                </div>
                <div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">
                    <div class="team-detail-text mt_30">
                        <div class="headstyle">
                            <h4>{{ DETAIL }}</h4>
                        </div>

                        {!! clean($team_member_detail->detail) !!}

                        <div class="team-contact mt_30">
                            <ul>
                                <li><i class="fa fa-envelope"></i>{{ $team_member_detail->email }}</li>
                                <li><i class="fa fa-phone"></i>{{ $team_member_detail->phone }}</li>
                                <li><i class="fa fa-globe"></i>{{ $team_member_detail->website }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Team End-->

    <!--Team-Area Start-->
    <div class="team-area bg-area pt_80 pb_80">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-headline">
                        <div class="headline">
                            <h2>{{ TEAM_MEMBERS }}</h2>
                        </div>
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
                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="Team Photo">

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


@endsection
