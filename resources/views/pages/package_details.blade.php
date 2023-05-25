@extends('layouts.app')
@section('content')
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      @foreach($package_photos as $key => $photo)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          <img src="{{ url('uploads',$photo->photo) }}" class="d-block w-100" alt="...">
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <div class="nadi">
              <h4>{{ $package_detail->p_name }}</h4>
              <a href="#"><i class="bi bi-stopwatch-fill"></i> 
                <?php
                  $timeDiff =  strtotime($package_detail->p_end_date) - strtotime($package_detail->p_start_date);
                  echo round($timeDiff / (60 * 60 * 24)) . " Days";
                ?>
                <span>{{ (float)$starRatings }}<i class="bi bi-star-fill"></i></span>({{ $package_reviews_count }})</a>
              <p class="mb-0"><a href="#"><i class="bi bi-geo-alt-fill"></i> Start an end in Anchorage</a></p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="babba">
              <h5>Tour Operator:</h5>
              <p>{{ $package_detail->p_tour_operator ? $package_detail->p_tour_operator : "Tripology" }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="babba">
              <h5>Maximum Group Size :</h5>
              <p>{{ $package_detail->p_max_group_size }}</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="babba">
              <h5>Age Range:</h5>
              <p>{{ $package_detail->p_age_range }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="babba">
              <h5>Operated In:</h5>
              <p>{{ $package_detail->p_operated_in }}</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="babba">
              <h5>Tour Id:</h5>
              <p>123456</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="babba">
              <h5>Huygine Measure:</h5>
              <p>Included</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">
            <div>
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <div class="map">
                      <iframe
                        src="{{ $package_detail->p_map }}"
                        style="border-radius:20px; padding: 20px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <div class="babba">
                          <h3>Heighlights</h3>
                          <h4>{{ $package_detail->p_description_short }}</h4>
                          <p><i class="bi bi-dot"></i>{!! $package_detail->p_description !!}</p>
                          
                          <!-- <h4>Exclusions</h4>
                          <p><i class="bi bi-dot"></i>. GST 5% on total billing.</p>
                          <p><i class="bi bi-dot"></i>. NGT/Green Tax for Rohtang Pass sightseeing.</p>
                          <p><i class="bi bi-dot"></i>. Any experience of personal nature viz tips to drive & guide, cigarettes, 
                            laundry, telephone calla, mini-bar  ets. </p>
                          <p><i class="bi bi-dot"></i>. All extra expense incurred at the hotel other than mentioned..</p>
                          <p><i class="bi bi-dot"></i>. Heater Charges 350-400 (Per night)</p>
                          <p><i class="bi bi-dot"></i>. Rohtang Pass cost not included,</p> -->
                        </div>
                      </div>                      
                  </h2>
                </div>
                
                
                <h3>Tour Itinerary</h3>
                <div class="accordion-item">
                  @foreach($itineraries as $itinerary)
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{$itinerary->id}}" aria-expanded="false" aria-controls="collapseTwo">
                        {{ $itinerary->title }}
                      </button>
                    </h2>
                    <div id="collapse-{{$itinerary->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">{!! $itinerary->description !!}</div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="kahdi">
          <h3>$ {{ $package_detail->p_price }} <span>per adult onwards</span></h3>
          <h3>What's included in the price</h3>

          <div class="row kuch">
            <div class="col-md-6 kuch1">
              <div class="katire2">
                <a href="#"><img src="{{ url('images/Group 1.png') }}" alt=""> <span>Twin-sharing rooms</span></a>
              </div>
            </div>

            <div class="col-md-6 kuch1">
              <div class="katire2">
                <a href="#"><img src="{{ url('images/Group 1.png') }}" alt=""> <span>Sightseeing in Ac Dezire/Etios</span></a>
              </div>
            </div>

            <div class="col-md-6 kuch1 mt-3">
              <div class="katire2">
                <a href="#"><img src="{{ url('images/Group 1.png') }}" alt=""> <span>Breakfast, Dinner</span></a>
              </div>
            </div>
          </div>

          <p><i class="bi bi-exclamation-circle"></i> Final price will be shared by our partner agents based on your requirements</p>
          <!-- <button>Get Customised Quotes</button> -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Get Customised Quotes
          </button>

          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content  popup-bg">
                <div class="modal-header">
                  <button type="button" class="btn-close" style="background: none;" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="{{ route('quote.store') }}" method="post">
                @csrf
                  <div class="modal-body ms-4">
                    <h2>Get a Quote</h2>
                    <div class="popup-input">
                      <input type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="text" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="date" placeholder="Start date" name="start_date" value="{{ old('start_date') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="date" placeholder="End date" name="end_date" value="{{ old('end_date') }}">
                    </div>
                    <input type="hidden" name="package_id" value="{{ $package_detail->id }}">
                    <div class="popup-input ms-2 mt-4">
                      <button type="submit">submit</button>
                    </div>

                  </div>
                </form>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row mt-4">
      <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
        <div class="babba">
          <h3>Similar Packages</h3>
          <p>Compare quotes from upto 3 travel agents for free</p>
        </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="owl-carousel runforthree owl-theme">
        @foreach($similar_packages as $package)
          <div class="item">
            <div class="girl text-start">
              <div class="girl1">
                <img src="{{ url('uploads',$package->p_photo)}}" alt="">
              </div>

              <div class="girl2">
                <?php 
                  $timeDiff =  strtotime($package->p_end_date) - strtotime($package->p_start_date);
                  $days = round($timeDiff / (60 * 60 * 24)) . " Days";
                  
                  $date1 = new DateTime($package->p_end_date);
                  $date2 = new DateTime($package->p_start_date);

                  $numberOfNights= $date2->diff($date1)->format("%a") . " Nights"; 
                ?>
                <h5 style="direction: ltr;"> {!! $days . "/" . $numberOfNights !!}</h5>
                <p style="direction: ltr;">{!! $package->p_name !!}</p>
                <h6>$ {{ $package->p_price }}</h6>
                <h4>Veiw details</h4>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="text-center btn-shimla">
        <button>View All Packages For Shimla</button>
      </div>
    </div>
  </div>
  </div>
</div>


    <div class="row mt-4">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="departure">
                        <h3>Select a departure month</h3>
                    </div>
                </div>
            </div>


            <div class="row box-btn">
              <div class="col-md-12">
                <div class="row">
                        <div class="col-md-2">
                            <div class="btn-month"><span><button><?php echo date('F Y'); ?></button></span></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button><?php echo date('F Y', strtotime("+1 month")); ?></button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button><?php echo date('F Y', strtotime("+2 month")); ?></button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button><?php echo date('F Y', strtotime("+3 month")); ?></button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button><?php echo date('F Y', strtotime("+4 month")); ?></button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button><?php echo date('F Y', strtotime("+5 month")); ?></button></div>
                        </div>
                  <!-- <div class="owl-carousel runforfive owl-theme">
                    <div class="item" >
                      <div class="btn-month"><span><button>May 2022</button></span></div>
                    </div>
                    <div class="item" >
                      <div class="btn-month"><button>May 2022</button></div>
                    </div>
                    <div class="item" >
                      <div class="btn-month"><button>July 2022</button></div>
                    </div>
                    <div class="item" >
                      <div class="btn-month"><button>Aug 2022</button></div>
                    </div>
                    <div class="item" >
                      <div class="btn-month"><button>Sept. 2022</button></div>
                    </div>
                    <div class="item" >
                      <div class="btn-month"><button>Oct.2022</button></div>
                    </div>                          
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-md-12 p-0">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="Departur-date">
                      <h3>Departure Date</h3> 
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="Departur-date">
                      <h3>End Date</h3> 
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="Departur-date">
                      <h3>Price</h3> 
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-12 p-0">
                    <hr style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="row">
                  @foreach($package_schedules as $schedule)
                    <div class="col-md-4">
                      <div class="Departur-date"><h3>{{ date("M jS, Y", strtotime($schedule->start_date)) }}</h3></div>
                    </div>

                    <div class="col-md-4">
                      <div class="Departur-date"><h3>{{ date("M jS, Y", strtotime($schedule->end_date)) }}</h3></div>
                    </div>

                    <div class="col-md-4">
                      <div class="Departur-date"><h3>$ {{ $schedule->price }}</h3></div>
                    </div>
                  @endforeach

                  <div class="col-md-3">
                    <div class="Departur-date">
                      <button>Confirm Date</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="row mt-5">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="departure">
                      <h3>Customer Reviews</h3>
                    </div>
                  </div>
                </div>
                @foreach($package_reviews as $reviews)
                  <div class="row">
                      <div class="col-md-12 p-0">
                          <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="d-flex john-parks">
                        <div>
                          <h3>{{ $reviews->reviewer_name[0] }}</h3>
                        </div>

                        <div class="ms-3 w-50">
                          <h2>{{ $reviews->reviewer_name }}</h2>
                          <h4>{{ date("M jS, Y", strtotime($reviews->created_at)) }}</h4>
                        </div>

                        <div class="mt-4 ms-3 dar1">
                          <h5 class="star-{{$reviews->rating}}">{{ $reviews->rating }} <i class="bi bi-star-fill"></i></h5>
                        </div>
                      </div>

                      <div class="john-parks">
                        <p>{!! $reviews->review !!}</p>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-md-12 p-0">
                      <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection