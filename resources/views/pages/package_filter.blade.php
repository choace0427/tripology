@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="babba2">
                        <h5>Similar Packages</h5>
                        <p><span>About Vietnam Tourism: </span>Evoking pictures of bustling historical cities, rivers,
                            beaches, rolling
                            green hills, Buddhist pagodas, delicious cuisine and unique traditions, the southeast Asian
                            Holidify’s Vietnam tour packages.</p>
                        <p>It takes a minimum of 7-8 days to travel across Vietnam properly. There are three weather
                            regions.
                            The best time to visit is during spring, from February to April, when Vietnam experiences
                            sunny
                            can be explored on a trip to Vietnam.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4 ">
                <div class="col-md-3 banda" id="filter_option" style="overflow: hidden">
                    <form action="{{ url('package/filter/list') }}" method="GET" id="filter">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="babba3">
                                    <h5>Filter By</h5>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="babba3">
                                    <a class="hover" style="cursor: pointer;" onclick="reset()">Reset All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Price Range (per person)</h5>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">

                                    <h6>Select from the ranges below</h6>
                                    @foreach($price as $row)
                                    <h5> <input type="checkbox" id="price" class="filter_list" onclick="filter_option()"
                                            name="{{$row->filter_type}}" value="{{ $row->filter_slug }}"
                                            @if(str_contains($type_list, $row->filter_slug)) checked
                                        @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Duration</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">
                                    <h6>Select from the ranges below</h6>
                                    @foreach($duration as $row)
                                    <h5> <input type="checkbox" id="duration" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Accomodation</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">
                                    <h6>Select from the ranges below</h6>
                                    @foreach($accomodation as $row)
                                    <h5> <input type="checkbox" id="accomodation" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Traveller</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">
                                    <h6>Select from the ranges below</h6>
                                    @foreach($traveller_type as $row)
                                    <h5> <input type="checkbox" id="traveller" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Transposition</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">
                                    <h6>Select from the ranges below</h6>
                                    @foreach($transposition as $row)
                                    <h5> <input type="checkbox" id="transposition" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Rating</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">
                                    <h6>Select from the ranges below</h6>
                                    @foreach($ratings as $row)
                                    <h5> <input type="checkbox" class="filter_list" id="rating"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Distance from..</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-2">
                                    <h6>Select from the ranges below</h6>
                                    @foreach($distance as $row)
                                    <h5> <input type="checkbox" id="distance" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked @endif>{{ $row->filter_name }}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Combined With</h5>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-1">
                                    <h5> <input type="checkbox"> Hanoi</h5>
                                    <h5> <input type="checkbox"> Phu Quoc Island</h5>
                                    <h5> <input type="checkbox"> Siem Reap</h5>
                                    <h5> <input type="checkbox"> Hoi An</h5>
                                    <h5> <input type="checkbox"> Da Nang</h5>
                                    <h5> <input type="checkbox"> Sapa</h5>
                                    <h5> <input type="checkbox"> Phnom Penh</h5>
                                    <h5> <input type="checkbox"> Ho Chi Minh City</h5>
                                    <h5> <input type="checkbox"> Halong Bay</h5>
                                    <h5> <input type="checkbox"> Hue</h5>
                                    <h5> <input type="checkbox"> Nha Trang</h5>
                                    <h5> <input type="checkbox"> Mekong Delta</h5>
                                    <h5> <input type="checkbox"> Ninh Binh</h5>
                                    <h5> <input type="checkbox"> Mai Chau</h5>
                                    <h5> <input type="checkbox"> Dong Hoi</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="babba">
                                    <h5>Starting From</h5>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="range pt-1">
                                    <h5> <input type="checkbox"> Hanoi</h5>
                                    <h5> <input type="checkbox"> Ho Chi Minh City</h5>
                                    <h5> <input type="checkbox"> Ho Chi Minh City</h5>
                                    <h5> <input type="checkbox"> N</h5>
                                    <h5> <input type="checkbox"> Saigon</h5>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="sort">
                                <h6>{{$filter_count}} Holiday Packages for Vietnam Found</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row rty">
                                <div class="col-md-6 rty1 text-end">
                                    <div class="sort">
                                        <h6>Sort by:</h6>
                                    </div>
                                </div>

                                <div class="col-md-6 rty1">
                                    <div class="sort"><button>Relvance</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($page < 1) <div class="row list"
                        style="display: flex; height: 240px; align-items: center; justify-content: center" id="data">No
                        Data
                </div>
                @else
                @foreach ($filter_data as $row)
                <div class="row list">
                    <div class="col-md-3 dard ps-0">
                        <div class="mal" style="height: 100%">
                            <img style="height: 100%" src="{{ asset('uploads/'.$row->p_photo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 tnam">
                        <!-- <div class="lock">
                            @php
                            $content = $row->p_policy;
                            @endphp
                            {!! $content !!}
                        </div> -->
                        <div class="lock">

                            @php
                            $p_name = explode(' ', $row->p_name);
                            @endphp
                            <h6>{{ $p_name[0] - 1 }} Nights / {{ $p_name[0] }} Days</h6>
                            <h5>Experience the Best of Vietnam from India - {{ $p_name[0] - 1 }} Nights
                                {{ $p_name[0] }} Days</h5>
                            <p>Hanoi(2N) → Halong Bay(1N) → Hue(1N) → Hoi
                                An(2N)→ Nha Trang(3N) → Ho Chi Minh City(2N)</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div>
                                        <i class="bi bi-house-lock-fill"></i>
                                        <h6><span>Twin-
                                                sharing
                                                rooms</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <i class="bi bi-house-lock-fill"></i>
                                        <h6><span>Sightseeing in a private cab</span></h6>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <i class="bi bi-house-lock-fill"></i>
                                        <h6><span>Twin-
                                                sharing
                                                rooms</span></h6>
                                    </div>
                                </div>
                            </div>

                            <h4 class="pt-3 tika"><span><i class="bi bi-arrow-up-right"></i></span> Boat Trip to
                                Ben
                                Tre (Mekong Delta)</h4>

                            <h4><span><i class="bi bi-arrow-up-right"></i></span> Boat Trip to Ben Tre (Mekong
                                Delta)</h4>
                        </div>
                    </div>

                    <div class="col-md-3 mekong">
                        <div class="row item-list">
                            <div class="col-md-6">
                                <div>
                                    <h6>INR 62,000</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <button>6% off</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <h5>$ {{$row->p_price}}</h5>
                                    <p>per adult on twin sharing</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="get">
                                    <button>Get Quotes ></button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="get2">
                                    <button>Get Quotes ></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif



                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="qutote text-center"
                            style="display: flex; justify-content: center; align-items: center">
                            <ul class="pagination" id="pagination">
                                @if($page >= 1)
                                <li style="display: flex; align-items: center">
                                    <a style="cursor: pointer;">
                                        << </a>
                                </li>
                                @for ($i = 1; $i <= $page; $i++) <li><a class="hover"
                                        style="cursor: pointer; display: flex; align-items: center"
                                        onclick="package_filter({{ $i }})">
                                        <span>
                                            {{ $i }}
                                        </span>
                                    </a></li>
                                    @endfor
                                    <li style="display: flex; align-items: center">
                                        <a style="cursor: pointer;" onclick="package_filter({{ $page }})">
                                            >>
                                        </a>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="babba">
                            <h5>Best International Tour Packages</h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tub">
                                    <img src="{{ asset('images/tub1.png') }}" alt="">
                                    <h6>Hanoi Packages</h6>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="tub">
                                    <img src="{{ asset('images/tub2.png') }}" alt="">
                                    <h6>Phu Quoc Island Packages</h6>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="tub">
                                    <img src="{{ asset('images/tub3.png') }}" alt="">
                                    <h6>Siem Reap Packages</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="babba">
                            <h5>Best International Tour Packages</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="owl-carousel runforfour owl-theme">
                                <div class="item84">
                                    <div class="text-start">
                                        <img src="{{ asset('images/raj1.png') }}" alt="">
                                        <h5> Maldives Packages</h5>
                                    </div>
                                </div>
                                <div class="item84">
                                    <div class="text-start">
                                        <img src="{{ asset('images/raj2.png') }}" alt="">
                                        <h5> Maldives Packages</h5>
                                    </div>
                                </div>
                                <div class="item84">
                                    <div class="text-start">
                                        <img src="{{ asset('images/raj3.png') }}" alt="">
                                        <h5> Maldives Packages</h5>
                                    </div>
                                </div>
                                <div class="item84">
                                    <div class="text-start">
                                        <img src="{{ asset('images/raj4.png') }}" alt="">
                                        <h5> Maldives Packages</h5>
                                    </div>
                                </div>
                                <div class="item84">
                                    <div class="text-start">
                                        <img src="{{ asset('images/raj1.png') }}" alt="">
                                        <h5> Maldives Packages</h5>
                                    </div>
                                </div>
                                <div class="item84">
                                    <div class="text-start">
                                        <img src="{{ asset('images/raj2.png') }}" alt="">
                                        <h5> Maldives Packages</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<output id="output"></output>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var form = document.getElementById("filter");
$(function() {
    // When the checkbox is checked, submit the form
    $('.filter_list').change(function() {
        var formData = new FormData(form);
        var params = {};

        var selectedPriceCheckboxes = document.querySelectorAll('input[class="filter_list"]:checked');
        selectedPriceCheckboxes.forEach(function(checkbox) {
            var key = encodeURIComponent(checkbox.name);
            var value = encodeURIComponent(checkbox.value);
            if (params[key]) {
                params[key].push(value);
            } else {
                params[key] = [value];
            }
        });

        var url = 'https://tripology.nodesure.com/package/filter/list/' + Object.keys(params).map(
            function(key) {
                return key + '=' + params[key].join(',');
            }).join('+');

        window.location.href = url;
    });
});

function reset() {
    window.location.href = 'https://tripology.nodesure.com/package/filter/list/';
}

function filter_option() {
    const form = document.getElementById("filter");
}

var isDragging = false;
var startX, startY;
var scrollLeft, scrollTop;

var scrollContainer = document.getElementById('filter_option');

scrollContainer.addEventListener('mousedown', function(e) {
    isDragging = true;
    startX = e.clientX;
    startY = e.clientY;
    scrollLeft = scrollContainer.scrollLeft;
    scrollTop = scrollContainer.scrollTop;
});

document.addEventListener('mousemove', function(e) {
    if (!isDragging) return;

    var deltaX = e.clientX - startX;
    var deltaY = e.clientY - startY;

    scrollContainer.scrollLeft = scrollLeft - deltaX;
    scrollContainer.scrollTop = scrollTop - deltaY;
});

document.addEventListener('mouseup', function() {
    isDragging = false;
});

$(document).ready(function() {

})
</script>

@endsection