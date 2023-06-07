@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="all-logo">
                    <img src="{{url('uploads',$profile->photo)}}" alt="">
                </div>
            </div>

            <div class="col-md-8">
                <div class="profile-Tripology">
                    <h4>{{$profile->name}}</h4>
                    <h5><i class="bi bi-geo-alt-fill"></i>  {{$profile->city}}, {{$profile->country}}</h5>
                    <!---div class="nadi">
                    <a href="#"><span>4<i class="bi bi-star-fill"></i></span></a></div-->
                    <!-- <h6>RATINGS</h6> -->
                    <!-- <p>7.5 <span><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i></span>  <i class="bi bi-star-fill"></i> </p> -->
                </div>
            </div>
        </div>
      </div>

      <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="profile-About">
                    <h5><i class="bi bi-person-circle"></i> About</h5>
                    <p>{!! $profile->description !!}</p>
                    <h4><i class="bi bi-person-square"></i> Contact Information</h4>
                </div>
            </div>
        </div>
      </div>


      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tripology-number">
                    <ul>
                        <li><a href="tel:{{$profile->phone}}">Phone Number: {{$profile->phone}}</a></li>
                        <li><a href="#">Address: {{$profile->city}}, {{$profile->country}}</a></li>
                        <li><a href="#">Email: {{$profile->email}}</a></li>
                        <li><a href="#">Website: <a href="{{$profile->website}}" target="_blank">{{$profile->website}}</a></li>
                    </ul>
                    <!--button>Edit</button-->
                </div>
            </div>
        </div>
      </div>
@endsection