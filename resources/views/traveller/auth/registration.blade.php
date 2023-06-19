@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <form action="{{ route('traveller.registration.store') }}" method="post">
                                @csrf
                    <div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="logi2 text-center">
                                    <h5>Traveller Registration: in to Tripology</h5>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="reg">
                                    <img src="{{url('images/reg-from.png')}}" alt="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="logi">
                                    <div>
                                        <input type="text" class="form-control" name="traveller_name" placeholder="Traveller Name *">
                                    </div>

                                    <div>
                                        <input type="email" class="form-control" name="traveller_email" placeholder="Traveller Email Address *">
                                    </div>

                                    <div>
                                        <input type="password" class="form-control" name="traveller_password" placeholder="Traveller Password *">
                                    </div>
                                     
                                    <div>
                                    <div class="mt-2 atti">
                                        <button type="submit">Submit</button>

                                        <p><a href="{{ route('traveller.login') }}">{{ EXISTING_USER_GO_TO_LOGIN }}</a></p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
