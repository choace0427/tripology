@extends('layouts.app')

@section('content')


<div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="derination-girl">
                    <img src="{{ asset('uploads/'.$destination_detail->d_photo) }}" alt="">
                    <div class="d-flex Excellent mt-4">
                        @if($star_ratings > 4)
                        <h4>Excellent</h4>
                        @elseif($star_ratings > 3 && $star_ratings < 4)
                        <h4>Above Average</h4>   
                        @elseif($star_ratings > 2 && $star_ratings < 3)
                        <h4>Average</h4>   
                        @elseif($star_ratings > 1 && $star_ratings < 2)
                        <h4>Below Average</h4>
                        @elseif($star_ratings > 0 && $star_ratings < 1)
                        <h4>Very Poor</h4> 
                        @else
                        <h4>No ratings</h4> 
                        @endif
                       
                        <h5 class="star-{{ceil($star_ratings)}}">{{ (float)$star_ratings }} <i class="bi bi-star-fill"></i></h5>
                        <h6>@if($rating_count){{$rating_count}}@endif <span>reviews on</span></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="Tours-Trips">
                    <h3>{{ $destination_detail->d_heading }}</h3>
                    <p>{{ $destination_detail->d_short_description }}</p>
                </div>


                <!--div class="row mt-5 packages-mar">
                    <div class="col-md-4">
                        <div class="BTN-destination">
                            
                            <i class="bi bi-search"></i><span>Destination</span>
                            <input type="text" placeholder="{{ $destination_detail->d_name }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="BTN-destination2">
                            <i class="bi bi-calendar3"></i>
                            <h5>Departure Date</h5>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="BTN-destination3">
                            <button>Search</button>
                        </div>
                    </div>

                    
                </div-->
            </div>
        </div>
      </div>



    <div class="portfolio-page pt_40 pb_80 bg-area">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-headline">
                        <div class="headline">
                            <h2>{{ $destination_detail->d_package_heading }}</h2>
                        </div>
                        <p>{{ $destination_detail->d_package_subheading }}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($packages as $row)
                    <div class="col-md-4 col-xs-6 clear-three wow fadeIn">
                        <div class="portfolio-item mt_30">
                            <div class="portfolio-bg"></div>
                            <img src="{{ asset('uploads/'.$row->p_photo) }}" alt="">
                            <div class="portfolio-text">
                                <a href="{{ asset('uploads/'.$row->p_photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-title">
                            <a href="{{ url('package/'.$row->p_slug) }}">
                                {{ $row->p_name }}<br>
                                <span class="fz_22"><i class="{{ $g_setting->currency_sign }}"></i> {{ $row->p_price }} / {{ PERSON }}</span>
                                @php
                                $last_booking_date = \Carbon\Carbon::parse($row->p_last_booking_date)->format('Y-m-d');
                                $today_date = \Carbon\Carbon::parse(date('Y-m-d'))->format('Y-m-d');
                                @endphp

                                @if($last_booking_date<$today_date)
                                    <br><span class="not-available-red">({{ NOT_AVAILABLE_FOR_BOOKING }})</span>
                                @else
                                    <br><span class="available-green">({{ AVAILABLE_FOR_BOOKING }})</span>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

     <div class="package-tabarea">
        <div class="container">
            <div class="row">
                      <div class="col-md-12">
                        <div class="babba dation">
                         <h3>Travel Terms & Conditions</h3>
                         <p>The purchase of any travel services offered by Infinity constitutes a contractual arrangement between you (the Participant) and Infinity and represents your acceptance of the Terms & Conditions. Please ensure that you read carefully and understand the Terms & Conditions prior to booking. These Terms & Conditions cover Deposit Amounts (Air & Land), Final Payment Dates, Confirmations, Invoicing, Cancellation Fee Schedules, Revisions & Revision Fees, Air Arrangements, Participation Eligibility & Reductions, Force Majeure, Special Needs, and Participation Requirements, Information required for Reservations and Travel, On Trip Experience Information, Safety & Medical Care, River Cruising, Trip Documents, Service Inquires After Your Trip and Responsibility.  <a href="#">View full Terms & Conditions</a></p>
                         
                         <h3 class="mt-3">Important Notes</h3>
                         <p><i class="bi bi-dot"></i>Vacation departures, itineraries, and prices are subject to change. </p>
                         <p><i class="bi bi-dot"></i>A non-refundable, non-transferable deposit is required for Infinity to reserve space for you. View <a href="#">Terms & Conditions</a> for limited exceptions and items not included in the price.</p>
                         <p><i class="bi bi-dot"></i>Additional airline-imposed fees for seat assignments may apply and are not included in your total package cost. Please refer to carrier websites for seat assignment policies and applicable pricing.</p>
                         

                         <h3 class="mt-3">Booking your Vacation with Air</h3>
                         <p>Our volume buying power saves you money. We may be able to provide you with flight arrangements from your gateway city. Infinity offers 2 air options: Flex Air and Instant Purchase Air. Early Airfare Price Guarantee locks in a price that is guaranteed not to increase. Air pricing and schedules are available approximately 330 days prior to the last travel date in the itinerary. At that time the best air price will be utilized and a new invoice with the air cost and confirmed schedule will be sent. The identity of the carrier, which may include the carrier’s codeshare partner, will be assigned and disclosed at this time. If the guaranteed price is the lowest, the schedule with the lowest fare per contracted class (s) of service will be booked. Any voluntary change to the confirmed flights negates the guaranteed price and is subject to air pricing at the time of the change.</p>
                         
                         <p>Guaranteed air-inclusive prices – air is only available to passengers traveling from the United States and only available when booked in conjunction with a land vacation. Additional per person, non-refundable, non-transferable deposits and payments are required for your international flights and/or for intra-trip air. These are in addition to the land deposits and payments. Air-inclusive trip pricing is guaranteed upon receipt of deposit or payment in full for the entire reservation as advised during the booking process. Deposit amounts for air range from $300 per person up to the full ticket price. Instant Purchase Air requires air payment in full at the time of booking (i.e. air-inclusive vacation) plus a non-refundable per person service fee of $30 (North/Central America), $50 (Europe/Middle East), or $80 (all other international destinations). Once booked, Instant Purchase Air is non-refundable and non-changeable. Once your airfare is confirmed and Infinity has received your full air and land deposit, your air-inclusive vacation price is guaranteed.</p>

                         <h3 class="mt-3">Air-Inclusive Vacations — Applicable Taxes & Fees</h3>
                         <p>Air-inclusive vacations include government-imposed taxes and fees applicable at the time of booking and will be shown as a Total Amount. Additional airline fees for baggage may apply. At the time of booking your air-inclusive vacation online, carrier Websites will be provided to check baggage fees, or you can visit www.iflybags.com for up-to-date baggage pricing/restrictions. For return travel from some countries, international travelers are required to pay entry and/or exit fees at the airport. These fees will be collected by the local government and are payable by the participant at time of travel. Your confirmation booking information will contain information about these fees.</p> 

                         <h3 class="mt-3">“Starting from prices” Disclaimer</h3>
                         <p>The “Starting at” or listed price is based on the lowest price available to book. Price is per passenger based on double occupancy and does not include airfare, except where noted on specific itineraries, and is subject to change without notice; additional fees/charges are not included. If a price is crossed out, the new price shown includes a limited-time promotional offer(s) – please review current promotions or deals for additional information. Some tours require intra-vacation flights (and in some cases, intra-vacation segments must be purchased from Infinity).</p> 
                        </div>
                      </div>                      
                  </div>
                </div>                      
            </div>
    <!--div class="package-tabarea pt_80 pb_80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-headline">
                        <div class="headline">
                            <h2>{{ $destination_detail->d_detail_heading }}</h2>
                        </div>
                        <p>{{ $destination_detail->d_detail_subheading }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt_30">
                <div class="d-flex align-items-start pack-tab">
                    <div class="nav flex-column nav-pills me-4 pack-tab-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">{{ INTRODUCTION }}</button>
                        <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">{{ EXPERIENCE }}</button>
                        <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">{{ WEATHER }}</button>
                        <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">{{ HOTEL }}</button>
                        <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">{{ TRANSPORTATION }}</button>
                        <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">{{ CULTURE }}</button>
                    </div>
                    <div class="tab-content pack-tab-right" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                            {!! clean($destination_detail->d_introduction) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                            {!! clean($destination_detail->d_experience) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                            {!! clean($destination_detail->d_weather) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                            {!! clean($destination_detail->d_hotel) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                            {!! clean($destination_detail->d_transportation) !!}
                        </div>
                        <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                            {!! clean($destination_detail->d_culture) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div-->

@endsection
