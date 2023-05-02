@extends('layouts.app')

@section('content')

<div class="dashboard-area bg-area pt_50 pb_80">
    <div class="container wow fadeIn">
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

                    <h1>{{ UPDATE_PROFILE }}</h1>

                    <div class="login-area bg-area pt_0">
                        
                        <div class="login-form">
                            <form action="{{ url('traveller/profile-change/update') }}" method="post">
                                @csrf
                                <div class="form-row">

                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="">{{ NAME }} *</label>
                                            <input type="text" class="form-control" name="traveller_name" value="{{ session()->get('traveller_name') }}">
                                        </div>
                                        <div class="col">
                                            <label for="">{{ EMAIL_ADDRESS }}</label>
                                            <input type="email" class="form-control" name="traveller_email" value="{{ session()->get('traveller_email') }}">
                                        </div>
                                    </div>

                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="">{{ PHONE }} *</label>
                                            <input type="text" class="form-control" name="traveller_phone" value="{{ session()->get('traveller_phone') }}">
                                        </div>
                                        <div class="col">
                                            <label for="">{{ COUNTRY }} *</label>
                                            <input type="text" class="form-control" name="traveller_country" value="{{ session()->get('traveller_country') }}">
                                        </div>
                                    </div>

                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="">{{ ADDRESS }} *</label>
                                            <input type="text" class="form-control" name="traveller_address" value="{{ session()->get('traveller_address') }}">
                                        </div>
                                        <div class="col">
                                            <label for="">{{ STATE }} *</label>
                                            <input type="text" class="form-control" name="traveller_state" value="{{ session()->get('traveller_state') }}">
                                        </div>
                                    </div>

                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="">{{ CITY }} *</label>
                                            <input type="text" class="form-control" name="traveller_city" value="{{ session()->get('traveller_city') }}">
                                        </div>
                                        <div class="col">
                                            <label for="">{{ ZIP_CODE }} *</label>
                                            <input type="text" class="form-control" name="traveller_zip" value="{{ session()->get('traveller_zip') }}">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ UPDATE }}</button>

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