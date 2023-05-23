@extends('layouts.app')
@section('content')
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      @foreach($package_photos as $key => $photo)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          <img src="{{ url('uploads',$photo->photo)}}" class="d-block w-100" alt="...">
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
                <span>4<i class="bi bi-star-fill"></i></span>({{ $package_reviews_count }})</a>
              <p class="mb-0"><a href="#"><i class="bi bi-geo-alt-fill"></i> Start an end in Anchorage</a></p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="babba">
              <h5>Tour Operator:</h5>
              <p>{{ $package_detail->p_tour_operator }}</p>
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.088464561845!2d75.87326407472497!3d26.805311676711323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396dc91ff3378a43%3A0xf1d1e4b907a67e9f!2sNodeSure%20Technologies%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1682573993528!5m2!1sen!2sin"
                        style="border-radius:20px; padding: 20px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <div class="babba">
                          <h3>Heighlights</h3>
                          <h4>Mother & other inclusive</h4>
                          <p><i class="bi bi-dot"></i>. 02 night accommodation in Shimla </p>
                          <p><i class="bi bi-dot"></i>. 03 night accommodation in Manali </p>
                          <p><i class="bi bi-dot"></i>. Daily buffet breakfast & dinner.</p>
                          <p><i class="bi bi-dot"></i>. Entire tour from Ex Delhi by an Air Conditioned DZIRE/Etios.</p>
                          <p><i class="bi bi-dot"></i>. Pick up and drop at Delhi,</p>

                          <h4>Exclusions</h4>
                          <p><i class="bi bi-dot"></i>. GST 5% on total billing.</p>
                          <p><i class="bi bi-dot"></i>. NGT/Green Tax for Rohtang Pass sightseeing.</p>
                          <p><i class="bi bi-dot"></i>. Any experience of personal nature viz tips to drive & guide, cigarettes, 
                            laundry, telephone calla, mini-bar  ets. </p>
                          <p><i class="bi bi-dot"></i>. All extra expense incurred at the hotel other than mentioned..</p>
                          <p><i class="bi bi-dot"></i>. Heater Charges 350-400 (Per night)</p>
                          <p><i class="bi bi-dot"></i>. Rohtang Pass cost not included,</p>


                        </div>
                      </div>
                      <h3>Tour Itinerary</h3>
                      <div class="tour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Day 1: Arrival in Chandigarh & Transfer to Shimla
                        </button>
                      </div>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="havai">
                        <img src="images/havai.png" alt="">
                        <h6 class="pt-3"><i class="bi bi-dot"></i> On arrival Delhi Airport/ Railway Station, a
                          representative will meet and assist with transfer to Shimla.</h6>
                        <h6><i class="bi bi-dot"></i> En-route, visit the Timber Trail Heights.</h6>
                        <h6><i class="bi bi-dot"></i>Check-in to hotel and relax before dinner at hotel.</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Day 2: Excursion to Kufri
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                      collapse plugin adds the appropriate classes that we use to style each element. These classes
                      control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                      modify any of this with custom CSS or overriding our default variables. It's also worth noting
                      that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                      does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Day 3: Transfer to Manali
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                      collapse plugin adds the appropriate classes that we use to style each element. These classes
                      control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                      modify any of this with custom CSS or overriding our default variables. It's also worth noting
                      that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                      does limit overflow.
                    </div>
                  </div>
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                      Day 4: Excursion to Solang Valley
                    </button>
                  </h2>
                  <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                      collapse plugin adds the appropriate classes that we use to style each element. These classes
                      control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                      modify any of this with custom CSS or overriding our default variables. It's also worth noting
                      that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                      does limit overflow.
                    </div>
                  </div>
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                      Day 5: Manali Sightseeing
                    </button>
                  </h2>
                  <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                      collapse plugin adds the appropriate classes that we use to style each element. These classes
                      control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                      modify any of this with custom CSS or overriding our default variables. It's also worth noting
                      that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                      does limit overflow.
                    </div>
                  </div>
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                      Day 6: Departure
                    </button>
                  </h2>
                  <div id="collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                      collapse plugin adds the appropriate classes that we use to style each element. These classes
                      control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                      modify any of this with custom CSS or overriding our default variables. It's also worth noting
                      that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                      does limit overflow.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="kahdi">
          <h3>$ 16,999 <span>per adult onwards</span></h3>
          <h3>What's included in the price</h3>

          <div class="row kuch">
            <div class="col-md-6 kuch1">
              <div class="katire2">
                <a href="#"><img src="images/Group 1.png" alt=""> <span>Twin-sharing
                    rooms</span></a>
              </div>
            </div>

            <div class="col-md-6 kuch1">
              <div class="katire2">
                <a href="#"><img src="images/Group 1.png" alt=""> <span>Sightseeing in Ac Dezire/Etios</span></a>
              </div>
            </div>

            <div class="col-md-6 kuch1 mt-3">
              <div class="katire2">
                <a href="#"><img src="images/Group 1.png" alt=""> <span>Breakfast, Dinner</span></a>
              </div>
            </div>
          </div>

          <p><i class="bi bi-exclamation-circle"></i> Final price will be shared by our partner
            agents based on your requirements</p>
          <button>Get Customised Quotes</button>
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
                <div class="item">
                  <div class="girl text-start">
                    <div class="girl1">
                      <img src="images/mahal1.png" alt="">
                    </div>
    
                    <div class="girl2">
                      <h5> 5Days/6 Nights</h5>
                      <p>Simla , Kufri & Manali Volvo Tour Package form Delhi</p>
                      <h6>$ 16,999 <span>17% Off</span></h6>
                      <h3>$14,000 per adult on twin Twin-sharing </h3>
                      <h4>Veiw details</h4>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="girl text-start">
                    <div class="girl1">
                      <img src="images/mahal2.png" alt="">
                    </div>
                    <div class="girl2">
                      <h5>5Days/6 Nights</h5>
                      <p> Simla,Manali tour for couple (professional photoshot also included)</p>
                      <h6>$ 16,999 <span>17% Off</span></h6>
                      <h3>$14,000 per adult on twin Twin-sharing </h3>
                      <h4>Veiw details</h4>
    
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="girl text-start">
                    <div class="girl1">
                      <img src="images/mahal3.png" alt="">
                    </div>
                    <div class="girl2">
                      <h5>5Days/6 Nights</h5>
                      <p>Simla , Kufri & Manali Volvo Tour Package form Delhi</p>
                      <h6>$ 16,999 <span>17% Off</span></h6>
                      <h3>$14,000 per adult on twin Twin-sharing </h3>
                      <h4>Veiw details</h4>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="girl text-start">
                    <div class="girl1">
                      <img src="images/mahal1.png" alt="">
                    </div>
                    <div class="girl2">
                      <h5> 5Days/6 Nights</h5>
                      <p> Heritage Shimla, Kullu and Mandali by volvo</p>
                      <h6>$ 16,999 <span>17% Off</span></h6>
                      <h3>$14,000 per adult on twin Twin-sharing </h3>
                      <h4>Veiw details</h4>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="girl text-start">
                    <div class="girl1">
                      <img src="images/mahal2.png" alt="">
                    </div>
                    <div class="girl2">
                      <h5>5Days/6 Nights</h5>
                      <p>Simla , Kufri & Manali Volvo Tour Package form Delhi</p>
                      <h6>$ 16,999 <span>17% Off</span></h6>
                      <h3>$14,000 per adult on twin Twin-sharing </h3>
                      <h4>Veiw details</h4>
    
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="girl text-start">
                    <div class="girl1">
                      <img src="images/mahal3.png" alt="">
                    </div>
                    <div class="girl2">
                      <h5>5Days/6 Nights</h5>
                      <p>Heritage Shimla, Kullu and Mandali by volvo</p>
                      <h6>$ 16,999 <span>17% Off</span></h6>
                      <h3>$14,000 per adult on twin Twin-sharing </h3>
                      <h4>Veiw details</h4>
                    </div>
                  </div>
                </div>
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
                        <!-- <div class="col-md-2">
                            <div class="btn-month"><span><button>May 2022</button></span></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button>May 2022</button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button>July 2022</button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button>Aug 2022</button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button>Sept. 2022</button></div>
                        </div>

                        <div class="col-md-2">
                            <div class="btn-month"><button>Oct.2022</button></div>
                        </div> -->




                        <div class="owl-carousel runforfive owl-theme">
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

                    <div class="row">
                        <div class="col-md-3">
                            <div class="Departur-date"><h3>6 June, 2022</h3></div>
                        </div>

                        <div class="col-md-3">
                            <div class="Departur-date"><h3>16 June,2022</h3></div>
                        </div>

                        <div class="col-md-3">
                            <div class="Departur-date"><h3>$221.44</h3></div>
                        </div>

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

                    <div class="row">
                        <div class="col-md-12 p-0">
                            <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="d-flex john-parks">
                        <div>
                            <h3>A</h3>
                        </div>

                        <div class="ms-3 w-50">
                            <h2>john parks.</h2>
                            <h4>December 6th, 2022</h4>
                        </div>

                        <div class="mt-4 ms-3 dar1">
                            <h5 class="star-1">1 <i class="bi bi-star-fill"></i></h5>
                        </div>
                    </div>

                    <div class="john-parks">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Possimus dicta fugiat sed officiis molestias, mollitia 
                            perspiciatis eum cupiditate officia iusto, labore</p>
                    </div>
                    </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 p-0">
                            <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12">
                        <div class="d-flex john-parks">
                        <div>
                            <h3>M</h3>
                        </div>

                        <div class="ms-3 w-50">
                            <h2>Murtaaz Challawala</h2>
                            <h4>December 6th, 2022</h4>
                        </div>

                        <div class="mt-4 ms-3 dar1">
                            <h5 class="star-2">2 <i class="bi bi-star-fill"></i></h5>
                        </div>
                    </div>

                    <div class="john-parks">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Possimus dicta fugiat sed officiis molestias, mollitia 
                            perspiciatis eum cupiditate officia iusto, labore</p>
                    </div>
                    </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12 p-0">
                            <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                        <div class="d-flex john-parks">
                        <div>
                            <h3>N</h3>
                        </div>

                        <div class="ms-3 w-50">
                            <h2>Nikita Loungani</h2>
                            <h4>December 6th, 2022</h4>
                        </div>

                        <div class="mt-4 ms-3 dar1">
                            <h5 class="star-3">3 <i class="bi bi-star-fill"></i></h5>
                        </div>
                    </div>

                    <div class="john-parks">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Possimus dicta fugiat sed officiis molestias, mollitia 
                            perspiciatis eum cupiditate officia iusto, labore</p>
                    </div>
                    </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12 p-0">
                            <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                        <div class="d-flex john-parks">
                        <div>
                            <h3>W</h3>
                        </div>

                        <div class="ms-3 w-50">
                            <h2>Wilson Xavier</h2>
                            <h4>December 6th, 2022</h4>
                        </div>

                        <div class="mt-4 ms-3 dar1">
                            <h5 class="star-4">4 <i class="bi bi-star-fill"></i></h5>
                        </div>
                    </div>

                    <div class="john-parks">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Possimus dicta fugiat sed officiis molestias, mollitia 
                            perspiciatis eum cupiditate officia iusto, labore</p>
                    </div>
                    </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 p-0">
                            <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                        <div class="d-flex john-parks">
                        <div>
                            <h3>Y</h3>
                        </div>

                        <div class="ms-3 w-50">
                            <h2>Yogesh sharma.</h2>
                            <h4>December 6th, 2022</h4>
                        </div>

                        <div class="mt-4 ms-3 dar1">
                            <h5 class="star-5">5 <i class="bi bi-star-fill"></i></h5>
                        </div>
                    </div>

                    <div class="john-parks">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Possimus dicta fugiat sed officiis molestias, mollitia 
                            perspiciatis eum cupiditate officia iusto, labore</p>
                    </div>
                    </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 p-0">
                            <hr style="margin-bottom: 8px; margin-top: 5px; border: solid 1.5px #000;">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection


      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

  <script>
    $('.runforthree').owlCarousel({
      rtl: true,
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    })

    $('.runforfive').owlCarousel({
      rtl: true,
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 5
        }
      }
    })
  </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html> -->