@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="logi2 text-center">
                                <h5>Registration: in to Tripology</h5>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="reg">
                                <img src="{{url('images/reg-from.png')}}" alt="Agency Registeration Form">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <form action="{{ route('agency.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="logi">
                                    <div>
                                        <input type="text" placeholder="Company Name" id="company_name" name="company_name" value="{{ old('company_name') }}">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="User Name" id="username" name="username" value="{{ old('username') }}">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Name" id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Website" id="website" name="website" value="{{ old('website') }}">
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div>
                                        <input type="password" placeholder="Password" id="password" name="password" value="{{ old('password') }}">
                                    </div>
                                    <div>
                                        <select class="optio" name="city">
                                            <option value="">Select City</option>
                                            @foreach($city_names as $city)
                                            <option @if(old('city') == $city) selected @endif>{{$city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <select class="optio" name="country">
                                            <option value="">Select Country</option>
                                            <option value="usa" selected>USA</option>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Phone" id="phone" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div>
                                        <input type="file" id="photo" name="photo" >
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="text-center atti">
                                                <button type="submit">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </form>
                        </div>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>

@endsection