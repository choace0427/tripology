@extends('layouts.app')

@section('content')

<div class="dashboard-area bg-area pt_50 pb_80">
    <div class="container-fluid wow fadeIn">
        <div class="row">
            
            @include('traveller.pages.check_profile_data')

            <div class="col-md-3 col-sm-12 wow fadeIn" data-wow-delay="0.1s">
                <div class="option-board mt_30">
                    <ul>
                        @include('layouts.sidebar_traveller')
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
                <div class="detail-dashboard mt_30">
                    
                    <h1>{{ UPDATE_PASSWORD }}</h1>

                    <div class="login-area bg-area pt_0">
                        <div class="login-form">
                            <form action="{{ url('traveller/password-change/update') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="row form-group mb-3">
                                        <div class="col-6">
                                            <label for="">{{ NEW_PASSWORD }} *</label>
                                            <input type="password" class="form-control" value="" name="password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="form1">{{ UPDATE }}</button>
                                </div>
                            </form>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection