@extends('layouts.app')
@section('content')
<div class="bg-2">
   @if($sliders)
   <div id="carouselExampleCaptions" class="carousel slide">
      <!-- <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
         </div> -->
      <div class="carousel-inner">
         @foreach($sliders as $key => $slider)
         <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{ url('uploads',$slider->slider_photo)}}" class="d-block w-100" alt="{{$slider->slider_heading}}">
         </div>
         @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
      </button>
   </div>
</div>
@endif
<!-- section-4 -->
<!-- section-4 -->
<!-- section-4 -->
<div class="bg-3">
   <div class="container">
      <div class="row">
         <div class="col-md-12 big1">
            <div class="big-btn">
               <i class="bi bi-geo-alt-fill"></i>
               <select>
                  <option value="option1">India</option>
                  <option value="option2">Usa</option>
               </select>
               <span>|</span>
               <span><img src="images/Vector.png" style="width: 2.3%;" class="Vecto" alt=""></span> 
               <input type="text" id="search" name="search" autocomplete="off" placeholder="Search by city, destination or tour">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section-5 -->
<!-- section-5 -->
<!-- section-5 -->
<!--div class="bg-4 mt-5">
   <div class="container pt-3">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
                  <div class="explore">
                     <h2>Explore</h2>
                  </div>
               </div>
            </div>
            <div class="row ges mt-3">
               <div class="col-md-4">
                  <div class="img-icon">
                     <img src="{{ asset('images/icon-1.jpeg') }}" alt="">
                     <a href="">
                        <h4>Packages</h4>
                     </a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="img-icon">
                     <img src="{{ asset('images/icon-2.jpeg') }}" alt="">
                     <a href="#">
                        <h4>Destination</h4>
                     </a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="img-icon">
                     <img src="{{ asset('images/icon-3.jpeg') }}" alt="">
                     <h4>Plans</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div-->
<!-- <div class="container">
   <div class="row mt-5">
     <div class="col-md-12">
       <div class="explore">
         <h2>Recent View</h2>
       </div>
     </div>
   </div>
   
   
   
   </div> -->
<!-- <div class="row">
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner">
       <div class="carousel-item active flex">
         <div class="item" >
           <div class="text-start nadi">
             <img src="images/img-1.png" alt="">
             <div class="herat">
               <i class="bi bi-heart"></i>
             </div>
             <h3>Alaska Kenai & Denali 
               Adventure</h3>
               <a href="#"><i class="bi bi-stopwatch-fill"></i> 5 Days <span>4 <i class="bi bi-star-fill"></i></span> (45)</a>
               <p>"Excellent tour allowing people 
                 many options for a activities."</p>
             <h6>Starting From ₹217,711</h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start nadi">
             <img src="images/img-2.png" alt="">
             <div class="herat">
               <i class="bi bi-heart"></i>
             </div>
             <h3>Alaska Kenai & Denali 
               Adventure</h3>
               <a href="#"><i class="bi bi-stopwatch-fill"></i> 5 Days <span>4 <i class="bi bi-star-fill"></i></span> (45)</a>
               <p>"Excellent tour allowing people 
                 many options for a activities."</p>
             <h6>Starting From ₹217,711</h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start nadi">
             <img src="images/img-3.png" alt="">
             <div class="herat">
               <i class="bi bi-heart"></i>
             </div>
             <h3>Alaska Kenai & Denali 
               Adventure</h3>
               <a href="#"><i class="bi bi-stopwatch-fill"></i> 5 Days <span>4 <i class="bi bi-star-fill"></i></span> (45)</a>
               <p>"Excellent tour allowing people 
                 many options for a activities."</p>
             <h6>Starting From ₹217,711</h6>
           </div>
         </div>
       </div>
       <div class="carousel-item flex">
         <div class="item" >
           <div class="text-start nadi">
             <img src="images/img-4.png" alt="">
             <div class="herat">
               <i class="bi bi-heart"></i>
             </div>
             <h3>Alaska Kenai & Denali 
               Adventure</h3>
               <a href="#"><i class="bi bi-stopwatch-fill"></i> 5 Days <span>4 <i class="bi bi-star-fill"></i></span> (45)</a>
               <p>"Excellent tour allowing people 
                 many options for a activities."</p>
             <h6>Starting From ₹217,711</h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start nadi">
             <img src="images/img-5.png" alt="">
             <div class="herat">
               <i class="bi bi-heart"></i>
             </div>
             <h3>Alaska Kenai & Denali 
               Adventure</h3>
               <a href="#"><i class="bi bi-stopwatch-fill"></i> 5 Days <span>4 <i class="bi bi-star-fill"></i></span> (45)</a>
               <p>"Excellent tour allowing people 
                 many options for a activities."</p>
             <h6>Starting From ₹217,711</h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start nadi">
             <img src="images/img-6.png" alt="">
             <div class="herat">
               <i class="bi bi-heart"></i>
             </div>
             <h3>Alaska Kenai & Denali 
               Adventure</h3>
               <a href="#"><i class="bi bi-stopwatch-fill"></i> 5 Days <span>4 <i class="bi bi-star-fill"></i></span> (45)</a>
               <p>"Excellent tour allowing people 
                 many options for a activities."</p>
             <h6>Starting From ₹217,711</h6>
           </div>
         </div>
       </div>
       <div class="carousel-item">
         <img class="d-block w-100" src="/images/Alca-desti4.png" alt="Third slide">
       </div>
     </div>
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   </div> -->
<div class="container">
   <div class="row mt-5">
      <div class="col-md-12">
         <div class="explore">
            <h2>Recent View</h2>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="owl-carousel runforthree owl-theme">
          @foreach($packages as $package)
            <div class="item" >
            <a href="{{ route('front.package_detail', $package->p_slug) }}">
              <div class="text-start nadi">
                  <img src="{{ asset('uploads/'.$package->p_photo) }}" alt="{{$package->p_name}}">
                  <div class="herat">
                    <i class="bi bi-heart"></i>
                  </div>
                  
                  <h3 style="direction: ltr;">{{$package->p_name}}</h3>
                  <a href="#"><i class="bi bi-stopwatch-fill"></i> 
                  @php 
                     $startDate = \Carbon\Carbon::parse($package->p_start_date); 
                     $endDate = \Carbon\Carbon::parse($package->p_end_date); 
                     echo $diff = $endDate->diffInDays($startDate);
                  @endphp
                  Days <span>@if($package->reviews_avg != null){{number_format($package->reviews_avg,1)}} @else 0 @endif <i class="bi bi-star-fill"></i></span> ({{$package->reviews_count}})</a>
                  <p>{{$package->p_description_short}}</p>
                  <h6>Starting From ${{$package->p_price}}</h6>
              </div>
              </a>
            </div>
            @endforeach  
         </div>
      </div>
   </div>
</div>
<div class="container bg-water">
   <div class="row">
      <div class="col-md-6 px-0">
         <div class="wat1">
            <div>
               <h3>{{ $spotlight->spotlight_heading }}</h3>
               <p>{{ $spotlight->spotlight_text }}</p>
            </div>
            <div class="wat3">
               <h4>{{ $spotlight->spotlight_deal_heading }}</h4>
               <div class="clip">
                  <h2>{!! $spotlight->spotlight_deal_offer_text !!}</h2>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="gret">
                        <a href="">
                        <button>{{ $spotlight->spotlight_deal_button_text }}</button>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="gret">
                        <h3>{!! $spotlight->spotlight_deal_text !!}</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 px-0">
         <div class="wat2">
            <div class="wat4">
               <h3>{{ $spotlight->spotlight_facilities_heading }}</h3>
               <div class="row">
                  <div class="col-md-5 ps-2">
                  {!! $spotlight->spotlight_facilities !!}
                     <!--p><span><i class="bi bi-star-fill"></i></span> </p-->
                     <!-- <p><span><i class="bi bi-star-fill"></i></span> Flat $80 OFF</p>
                        <p><span><i class="bi bi-star-fill"></i></span> 40% OFF up to $80</p>
                        <p><span><i class="bi bi-star-fill"></i></span> 10% Hotal Free</p> -->
                  </div>
                  <div class="col-md-7">
                     <div class="pul">
                        <img src="{{ url('uploads/'.$spotlight->spotlight_facilities_photo) }}" alt="">
                     </div>
                  </div>
               </div>
               <a href="">
               <button>{{ $spotlight->spotlight_facilities_button_text }}</button>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section-6 -->
<!-- section-6 -->
<!-- section-6 -->
<div class="bg-4 ges1 upcoming mt-5">
   <div class="container pt-3">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
                  <div class="explore">
                     <h2>Places to visit in upcoming months</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="img-icon-2">
                     <div class="owl-carousel runforthree owl-theme">
                        <div class="item" >
                           <div class="text-start">
                              <img src="images/img-1.png" alt="">
                              <h5><?php echo date('F', strtotime("+3 month")); ?></h5>
                           </div>
                        </div>
                        <div class="item" >
                           <div class="text-start">
                              <img src="images/img-2.png" alt="">
                              <h5><?php echo date('F', strtotime("+2 month")); ?></h5>
                           </div>
                        </div>
                        <div class="item" >
                           <div class="text-start">
                              <img src="images/img-3.png" alt="">
                              <h5><?php echo date('F', strtotime("+1 month")); ?></h5>
                           </div>
                        </div>
                        <div class="item" >
                           <div class="text-start">
                              <img src="images/img-4.png" alt="">
                              <h5><?php echo date('F', strtotime("+6 month")); ?></h5>
                           </div>
                        </div>
                        <div class="item" >
                           <div class="text-start">
                              <img src="images/img-5.png" alt="">
                              <h5><?php echo date('F', strtotime("+5 month")); ?></h5>
                           </div>
                        </div>
                        <div class="item" >
                           <div class="text-start">
                              <img src="images/img-6.png" alt="">
                              <h5><?php echo date('F', strtotime("+4 month")); ?></h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-4 ges1">
               <div class="col-md-12">
                  <div class="explore">
                     <h2>Packages in trend</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="img-icon-2">
                     <div class="owl-carousel runforthree owl-theme">
                        @foreach($featured_packages as $package)
                        <div class="item" >
                           <div class="text-start">
                              <img src="{{ asset('uploads/'.$package->p_photo) }}" alt="">
                              <h5  style="direction: ltr;">{!! $package->p_name !!}</h5>
                              <h6>Starting from $ <span>{{ $package->p_price }}</span></h6>
                           </div>
                        </div>
                        @endforeach;
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section-7 -->
<!-- section-7 -->
<!-- section-7 -->
<!-- <div class="container">
   <div class="row ges1 mt-4">
     <div class="col-md-12">
       <div class="expol">
         <h3>Future true</h3>
       </div>
     </div>
   </div>
   
   <div class="row">
     <div class="col-md-12">
       <div class="owl-carousel runforthree owl-theme">
         <div class="item" >
           <div class="text-start">
             <img src="images/img-1.png" alt="">
             <h5>Andaman Packages</h5>
             <h6>Starting from $ <span>7500</span></h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start">
             <img src="images/img-2.png" alt="">
             <h5>Dalhousie Packages</h5>
             <h6>Starting from $ <span>7500</span></h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start">
             <img src="images/img-3.png" alt="">
             <h5>Munnar Packages</h5>
             <h6>Starting from $ <span>7500</span></h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start">
             <img src="images/img-4.png" alt="">
             <h5>Munnar Packages</h5>
             <h6>Starting from $ <span>7500</span></h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start">
             <img src="images/img-5.png" alt="">
             <h5>Munnar Packages</h5>
             <h6>Starting from $ <span>7500</span></h6>
           </div>
         </div>
         <div class="item" >
           <div class="text-start">
             <img src="images/img-6.png" alt="">
             <h5>Munnar Packages</h5>
             <h6>Starting from $ <span>7500</span></h6>
           </div>
         </div>
       
     </div>
     </div>
   </div>
   </div> -->
<div class="bg-5 ges1 mt-1">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
                  <div class="expol">
                     <h3>Popular destination</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <?php
                     // echo "<pre>";
                     // print_r($destinations);
                     // echo "</pre>";
                     ?>
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                     @foreach($parents as  $count => $dest)
                      <li class="nav-item"  role="presentation">
                          <button  @if($count == 0) class="nav-link bhan active" @else class="nav-link" @endif id="pills-home-tab-{{ $dest->id }}" data-bs-toggle="pill" data-bs-target="#pills-home-{{ $dest->id }}" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><img src="{{ asset('uploads/'.$dest->d_photo) }}" style="width: 15%;" alt=""> {{$dest->d_name}}</button>
                      </li>
                     @endforeach
                     <!--li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><img src="images/Africa.png" style="width: 25%;" alt=""> Africa</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img src="images/Asia.png" style="width: 31%;" alt=""> Asia</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-Jungle" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img src="images/Latin America.png" style="width: 16%;" alt=""> Latin America</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-Heritage" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img src="images/Latin America.png" style="width: 16%;"alt=""> North America</button>
                     </li-->
                  </ul>
                  <hr style="margin-top: 0px !important;">
                  <div class="tab-content" id="pills-tabContent">
                  @foreach($parents as $count => $dest)
                     <div @if($count == 0) class="tab-pane fade show active" @else class="tab-pane" @endif id="pills-home-{{ $dest->id }}" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        @if($dest->children->isNotEmpty())
                           <div class="row">
                              <div class="col-md-3 ps-0">
                                 <div class="amal">
                                    <ul>
                                       @foreach($dest->children as $child)
                                          <li><a href="#">{{ $child->d_name }}</a></li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        @endif
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- </body>
   </html> -->

@endsection