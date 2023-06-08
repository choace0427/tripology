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
              <p class="mb-0"><a href="#"><i class="bi bi-geo-alt-fill"></i> Start and end in {{$package_detail->p_started_from}}</a></p>
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
                    {!! $package_detail->p_map !!}
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <div class="babba">
                         {!! $package_detail->p_description !!}
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
                <form id="leads_form">
                  <div class="modal-body ms-4">
                    <h2>Get a Quote</h2>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                      <ul></ul>
                  </div>
                    <div class="popup-input">
                      <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ old('first_name') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="text" placeholder="Last Name" id="last_name" name="last_name" value="{{ old('last_name') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="text" placeholder="Phone Number" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="text" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="date" placeholder="Start date" id="start_date" name="start_date" value="{{ old('start_date') }}">
                    </div>

                    <div class="popup-input mt-4">
                      <input type="date" placeholder="End date" id="end_date" name="end_date" value="{{ old('end_date') }}">
                    </div>
                    <input type="hidden" name="package_id" id="package_id" value="{{ $package_detail->id }}">
                    <div class="popup-input ms-2 mt-4">
                      <button type="submit" class="btn-submit">submit</button>
                    </div>
                  </div>
                </form>
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
                <h6 style="direction: ltr;">$ {{ $package->p_price }}</h6>
                <h4><a href="{{url('package',$package->p_slug)}}">View details</a></h4>
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
        <button>View All Packages For {{$package_detail->destination->d_name}}</button>
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
                  <div class="owl-carousel runforfive owl-theme">
                    @foreach($package_schedules as $key => $schedule)
                        <div class="item" >
                          <div class="btn-month"><button class="show_schedule_dates" id="{{str_replace(' ', '_',$key)}}">{{$key}}</span></div>
                        </div>
                      @endforeach             
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-0">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="Departur-date">
                      <h3>Departure Date</h3> 
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="Departur-date">
                      <h3>End Date</h3> 
                    </div>
                  </div>

                  <div class="col-md-3">
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
                @foreach($package_schedules as $key => $schedule)
                  @foreach($schedule as  $schedule_dates)
                    <div class="row schedule_dates" id="{{str_replace(' ', '_',$key)}}" >
                        <div class="col-md-3">
                            <div class="Departur-date"><h3>{{ date("d F, Y", strtotime($schedule_dates->start_date)) }}</h3></div>
                          </div>

                          <div class="col-md-3">
                              <div class="Departur-date"><h3>{{ date("d F, Y", strtotime($schedule_dates->end_date)) }}</h3></div>
                          </div>

                          <div class="col-md-3">
                              <div class="Departur-date"><h3>$ {{$schedule_dates->price}}</h3></div>
                          </div>
                        <div class="col-md-3">
                            <div class="Departur-date">
                                <button class="show_quote_form mb-1" data-package_start_date="{{ date('Y-m-d', strtotime($schedule_dates->start_date)) }}" 
                                data-package_end_date="{{ date('Y-m-d', strtotime($schedule_dates->end_date)) }}"
                                data-package_id="{{$schedule_dates->package_id}}">Confirm Date</button>
                            </div>
                        </div>
                    </div>
                  @endforeach
                @endforeach
              </div>
            </div>


            @if($package_reviews)
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
      @endif
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

      <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<style>
 #leads_form label.error {
    margin-top:5px;
    width: 100%;
    color: red;
}

#leads_form input.error {
    border: 2px solid red;
    background-color: #ffffd5;
    margin: 0;
    color: red;
}

  </style>
  <script type="text/javascript">
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
  
    $(".btn-submit").click(function(e){
        $("#leads_form").validate({
            rules: {
              first_name: {           //input name: fullName
                    required: true,   //required boolean: true/false
                    minlength: 5,      
                },
                last_name: {              //input name: email
                    required: true,   //required boolean: true/false
                },
                phone_number: {            //input name: subject
                    required: true,   //required boolean: true/false
                    minlength: 5,
                    number: true
                },
                email: {            //input name: message
                    required: true,
                    email:true
                },
                start_date: {            //input name: message
                    required: true,
                },
                end_date: {            //input name: message
                    required: true,
                }
            },
            submitHandler: function(form) {
              var first_name = $("#first_name").val();
              var last_name = $("#last_name").val();
              var phone_number = $("#phone_number").val();
              var email = $("#email").val();
              var start_date = $("#start_date").val();
              var end_date = $("#end_date").val();
              var package_id = $("#package_id").val();
          
              $.ajax({
                type:'POST',
                url:"{{ route('lead.store')}}",
                headers: {
                      "Accept": "application/json",
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                  },
                data:{package_id:package_id,first_name:first_name, last_name:last_name, phone_number:phone_number, email:email, start_date:start_date, end_date:end_date},
                success:function(data){
                      if($.isEmptyObject(data.error)){
                          $('#staticBackdrop').modal('hide');
                          toastr.success('Qoute form submitted Successfully!')
                          $('#leads_form')[0].reset();
                      }else{
                          printErrorMsg(data.error);
                      }
                }
              });
            }
        }); 
    });
  
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    
    let first_child = jQuery(".schedule_dates").first().attr("id");
    
    jQuery('.schedule_dates').hide();
    jQuery('.schedule_dates#'+first_child).show();
    jQuery('.show_schedule_dates').first().addClass('active');
    jQuery('.show_schedule_dates').on('click',function(){
        let current = jQuery(this).attr('id');
        jQuery('.schedule_dates').hide();
        jQuery('.show_schedule_dates').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.schedule_dates#'+current).show();
    });

    jQuery('.show_quote_form').on('click',function(){
      $('#staticBackdrop').modal('show');
      jQuery('#start_date').val(jQuery(this).data('package_start_date'));
      jQuery('#end_date').val(jQuery(this).data('package_end_date'));
    });
</script>
@endsection