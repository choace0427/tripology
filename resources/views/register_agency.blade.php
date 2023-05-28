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
                                <img src="{{url('images/reg-from.png')}}" alt="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="logi">
                                <div>
                                    <input type="text" placeholder="Company Name" id="company_name" value="{{ old('company_name') }}">
                                </div>

                                <div>
                                    <input type="text" placeholder="User Name" id="username" value="{{ old('username') }}">
                                </div>

                                <div>
                                    <input type="text" placeholder="Name" id="name" value="{{ old('name') }}">
                                </div>

                                <div>
                                    <input type="text" placeholder="Website" id="website" value="{{ old('website') }}">
                                </div>

                                <div>
                                    <input type="text" placeholder="Email" id="email" value="{{ old('email') }}">
                                </div>

                                <div>
                                    <input type="password" placeholder="Password" id="password" value="{{ old('password') }}">
                                </div>

                                <div>
                                    <select class="optio">
                                        <option value="option1">City</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <option value="option3">Option 4</option>
                                        <option value="option3">Option 5</option>
                                        <option value="option3">Option 6</option>
                                        <option value="option3">Option 7</option>
                                        
                                      </select>
                                </div>

                                <div>
                                    <select class="optio">
                                        <option value="option1">Country</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <option value="option3">Option 4</option>
                                        <option value="option3">Option 5</option>
                                        <option value="option3">Option 6</option>
                                        <option value="option3">Option 7</option>
                                      </select>
                                </div>

                                <div>
                                    <input type="text" placeholder="Phone" id="phone" value="{{ old('phone') }}">
                                </div>

                                <div>
                                        <input type="file" id="myFile" name="filename">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="text-center atti">
                                <button>Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection