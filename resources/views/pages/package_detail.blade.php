@extends('layouts.app')

@section('content')
    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_package) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>
                    {{ $package_detail->p_name }}<br>
                    (<i class="{{ $g_setting->currency_sign }}"></i> {{ $package_detail->p_price }} / {{ PERSON }})
                </h1>
            </div>
        </div>
    </div>

    <div class="featured-detail country-detail pt_30 pb_20 bg_white">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">

                    <div class="fea-descrip">

                        <div class="headstyle-two mt_30">
                            <h4>{{ TOUR_DATES }}</h4>
                        </div>
                        <div class="descrip-pre table-responsive mb_25">
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{ TOUR_START_DATE }}</th>
                                    <th>{{ TOUR_END_DATE }}</th>
                                    <th>{{ LAST_BOOKING_DATE }}</th>
                                </tr>
                                <tr>
                                    <td><span class="fz_20"><b>{{ $package_detail->p_start_date }}</b></span></td>
                                    <td><span class="fz_20"><b>{{ $package_detail->p_end_date }}</b></span></td>
                                    <td>
                                        @php
                                        $last_booking_date = \Carbon\Carbon::parse($package_detail->p_last_booking_date)->format('Y-m-d');
                                        $today_date = \Carbon\Carbon::parse(date('Y-m-d'))->format('Y-m-d');
                                        @endphp

                                        @if($last_booking_date<$today_date)
                                            @php $cls = 'not-available-red'; @endphp
                                        @else
                                            @php $cls = 'available-green'; @endphp
                                        @endif

                                        <span class="{{ $cls }} fz_20"><b>{{ $package_detail->p_last_booking_date }}</b></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="headstyle-two">
                            <h4>{{ TOUR_DESCRIPTION }}</h4>
                        </div>
                        <div class="descrip-pre">
                            {!! clean($package_detail->p_description) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
                    <div class="fea-descrip mt_30">
                        <div class="headstyle-two">
                            <h4>{{ BOOK_NOW }}</h4>
                        </div>
                        <div class="row book-now">
                            <div class="col-md-12">
                                <form action="{{ route('front.package_store_list') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package_detail->id }}">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>{{ TOTAL_PRICE_PER_PERSON }}</label>
                                                <div class="mb_5 fz_32">
                                                    <i class="{{ $g_setting->currency_sign }}"></i> {{ $package_detail->p_price }}
                                                </div>
                                                <div class="sep mb_10"></div>
                                                <label>{{ TOTAL_PERSONS }}</label>
                                                <select id="numberPerson" name="total_person" class="custom-select select2 mb_15 w_auto">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                </select>
                                                <div class="sep mb_15"></div>
                                                <label>{{ TOTAL_PRICE }}</label>
                                                <div class="mb_15 fz_32">
                                                    <i class="{{ $g_setting->currency_sign }}"></i> <span id="totalPrice">{{ $package_detail->p_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if($last_booking_date>$today_date)
                                    <div class="form-group button-booking">
                                        <button class="btn btn-info btn-lg" type="submit">{{ BOOK_YOUR_SEAT }}</button>
                                    </div>
                                    @else
                                    <div class="text-danger">{{ CAN_NOT_BOOK_DATE_OVER_MESSAGE }}</div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="featured-detail country-detail pt_0 pb_80 bg_white">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">


                    <div class="fea-descrip mt_30">
                        <div class="headstyle-two">
                            <h4>{{ MORE_INFORMATION }}</h4>
                        </div>
                    </div>


                    <div class="packmoreinfo-tab">
                        <ul class="nav nav-pills mb-3 packmoreinfo-tab-top" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">{{ TOUR_PHOTOS }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">{{ TOUR_VIDEOS }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false">{{ TOUR_INFORMATION }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="false">{{ ITINERARY }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="false">{{ POLICY }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false">{{ TERM_AND_CONDITIONS }}</button>
                            </li>
                        </ul>
                        <div class="tab-content packmoreinfo-tab-bottom" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">

                                <div class="row">

                                    @foreach($package_photos as $row)
                                    <div class="col-md-4 col-xs-6 clear-three col-item">
                                        <div class="portfolio-item">
                                            <div class="portfolio-bg"></div>
                                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                                            <div class="portfolio-text">
                                                <a href="{{ asset('uploads/'.$row->photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">

                                <div class="row">

                                    @foreach($package_videos as $row)
                                    <div class="col-md-6 col-xs-6 clear-two col-item">
                                        <div class="portfolio-item">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $row->video_youtube_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">

                                <div class="feat-detail-table table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <tr>
                                            <th class="w_200">{{ DETAIL_LOCATION }}</th>
                                            <td>
                                                {!! clean(nl2br($package_detail->p_location)) !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>{{ TOUR_START_DATE }}</th>
                                            <td>{{ $package_detail->p_start_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ TOUR_END_DATE }}</th>
                                            <td>{{ $package_detail->p_end_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ LAST_BOOKING_DATE }}</th>
                                            <td>{{ $package_detail->p_last_booking_date }}</td>
                                        </tr>

                                        <tr>
                                            <th>{{ ADDRESS_IN_MAP }}</th>
                                            <td>
                                                {!! $package_detail->p_map !!}
                                            </td>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">

                                {!! clean($package_detail->p_itinerary) !!}

                            </div>
                            <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">

                                {!! clean($package_detail->p_policy) !!}

                            </div>
                            <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">

                                {!! clean($package_detail->p_terms) !!}

                            </div>
                        </div>

                    </div><!-- //packmoreinfo-tab -->


                </div>
            </div>
        </div>
    </div>

    <script>
        (function($) {
            
            "use strict";
            
            $(document).ready(function() {
                $('#numberPerson').on('change',function() {
                    var selectVal = $('#numberPerson').val();
                    var selectPrice = {{ $package_detail->p_price }};
                    var totalPrice = selectVal * selectPrice;
                     $('#totalPrice').text(totalPrice);
                });
            });
        
        })(jQuery);
    </script>


@endsection