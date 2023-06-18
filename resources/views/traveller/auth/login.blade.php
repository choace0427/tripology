@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="main-login">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logi">
                                <img src="{{url('images/login-img.png')}}" alt="Login Image">
                            </div>
                        </div>

                        <div class="col-md-6 ps-5 pt-3 mt-5">
                            <form action="{{ route('traveller.login.store') }}" method="post">
                                 @csrf
                                <div class="logi">
                                    <h5>Sign in to Tripology</h5>
                                    <div>
                                        <input type="text" class="form-control" name="traveller_email">
                                    </div>
                                    <div>
                                        <input type="password" class="form-control" name="traveller_password">
                                    </div>

                                    <p>Please enter a valid email address.</p>

                                    <button type="submit" name="form1">Sign In</button>

                                    <p>Don't have an account? <a href="{{ route('traveller.registration') }}">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
