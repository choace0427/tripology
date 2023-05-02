@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_team_member) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $team_member->name }}</h1>
            </div>
        </div>
    </div>

    <div class="team-area pt_50 pb_80">
        <div class="container wow fadeIn">

            <div class="row">
                <div class="col-md-12">
                    {!! clean($team_member->detail) !!}
                </div>
            </div>

            <div class="row">

                @foreach($team_members as $row)
                <div class="col-md-3 col-sm-4 col-xs-6 clear-four wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item mt_30">
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
                </div>
                @endforeach


            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $team_members->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection
