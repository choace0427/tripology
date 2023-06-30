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
                <div class="col-md-3 banda" id="filter_option"
                    style="overflow-y: scroll; padding: 10px 12px !important">
                    <form action="{{ url('package/filter/list') }}" method="GET" id="filter">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="babba3">
                                    <h5>Filter By</h5>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="babba3">
                                    <h5 style="cursor: pointer;" onclick="reset()">Reset All</a>
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" id="price" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            value="{{ $row->filter_slug }}" @if(str_contains($type_list,
                                            $row->filter_slug)) checked
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" id="duration"
                                            class="filter_list" onclick="filter_option()" name="{{$row->filter_type}}"
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" id="accomodation"
                                            class="filter_list" onclick="filter_option()" name="{{$row->filter_type}}"
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" id="traveller"
                                            class="filter_list" onclick="filter_option()" name="{{$row->filter_type}}"
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" id="transposition"
                                            class="filter_list" onclick="filter_option()" name="{{$row->filter_type}}"
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" class="filter_list"
                                            id="rating" onclick="filter_option()" name="{{$row->filter_type}}"
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
                                    <h5> <input type="checkbox" style="margin-right: 6px" id="distance"
                                            class="filter_list" onclick="filter_option()" name="{{$row->filter_type}}"
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
                                    @foreach($combine as $row)
                                    <h5> <input type="checkbox" style="margin-right: 6px"
                                            value="{{ $row->filter_slug }}" id="combine" class="filter_list"
                                            onclick="filter_option()" name="{{$row->filter_type}}"
                                            @if(str_contains($type_list, $row->filter_slug)) checked
                                        @endif>{{ $row->filter_name }} </h5>
                                    @endforeach
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
                        <div class="col-md-7">
                            <div class="sort">
                                <h6>{{$filter_count}} Holiday Packages Found</h6>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row rty">
                                <div class="col-md-6 rty1 text-end">
                                    <div class="sort">
                                        <h6>Sort by:</h6>
                                    </div>
                                </div>

                                <div class="col-md-6 rty1">
                                    <select class="form-select" id="filter_sort" name="filter_sort">
                                        <option value="p_price" data-url="{{$filter_slug}}">Price</option>
                                        <option value="p_travel_day" data-url="{{$filter_slug}}">Duration</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter_list">
                        @if($page < 1) <div class="row list"
                            style="display: flex; height: 240px; align-items: center; justify-content: center"
                            id="data">No
                            Data
                    </div>
                    @else
                    @foreach ($filter_data as $row)
                    <div class="ddd row list">
                        <div class="col-md-3 dard ps-0">
                            <div class="mal" style="height: 100%">
                                <img style="height: 100%" src="{{ asset('uploads/'.$row->p_photo) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 tnam">
                            <div class="lock">

                                <h6>{{ $row->p_travel_day }} Nights / {{ $row->p_travel_day + 1 }} Days</h6>
                                <h5>{{ $row->p_name}} from {{$row->p_started_from}} - {{ $row->p_travel_day }} Nights
                                    {{ $row->p_travel_day + 1 }} Days</h5>
                                @php
                                $travel_guide = explode(",", $row->p_travel_guide);
                                $count = count($travel_guide);
                                $re_count = 1;
                                @endphp
                                @foreach ($travel_guide as $guide)
                                <span id="travel_guide">{{ $guide }} @if($count != $re_count) → @endif </span>
                                @php
                                $re_count++;
                                @endphp
                                @endforeach

                                @php
                                $travel_accomodation = explode(",", $row->p_travel_accomodation);
                                @endphp
                                <div id="travel_accomodation" class="row">
                                    @foreach ($travel_accomodation as $accomodation)
                                    <div class="col-md-4">
                                        <div>
                                            <i class="bi bi-house-lock-fill"></i>
                                            <h6><span>{{ $accomodation }}</span></h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                @php
                                $travel_type = explode(",", $row->p_travel_type);
                                @endphp
                                @foreach ($travel_type as $type)
                                <h4 class="pt-3 tika"><span><i class="bi bi-arrow-up-right"></i></span> {{$type}}</h4>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-3 mekong">

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
                                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Quotes
                                            ></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="qutote text-center"
                            style="display: flex; justify-content: center; align-items: center">
                            <ul class="pagination" id="pagination">
                                @if($page >= 1)
                                <li style="display: flex; align-items: center">
                                    <a style="cursor: pointer;" onclick="package_filter(1, '{{$filter_slug}}')">
                                        << </a>
                                </li>
                                @for ($i = 1; $i <= $page; $i++) <li><a class="hover"
                                        onclick="package_filter({{$i}}, '{{$filter_slug}}')"
                                        style="cursor: pointer; display: flex; align-items: center">
                                        <span>
                                            {{ $i }}
                                        </span>
                                    </a></li>
                                    @endfor
                                    <li style="display: flex; align-items: center">
                                        <a style="cursor: pointer;"
                                            onclick="package_filter({{$page}}, '{{$filter_slug}}')">
                                            >>
                                        </a>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                    <div id="test"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content popup-bg">
            <div class="modal-header">
                <button type="button" class="btn-close" style="background: none;" data-bs-dismiss="modal"
                    aria-label="Close">x</button>
            </div>
            <form id="leads_form">
                <div class="modal-body ms-4">
                    <h2>Get a Quote</h2>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="popup-input">
                        <input type="text" placeholder="First Name" name="first_name" id="first_name"
                            value="{{ old('first_name') }}">
                    </div>

                    <div class="popup-input mt-4">
                        <input type="text" placeholder="Last Name" id="last_name" name="last_name"
                            value="{{ old('last_name') }}">
                    </div>

                    <div class="popup-input mt-4">
                        <input type="text" placeholder="Phone Number" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}">
                    </div>

                    <div class="popup-input mt-4">
                        <input type="text" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="popup-input mt-4">
                        <input type="date" placeholder="Start date" id="start_date" name="start_date"
                            value="{{ old('start_date') }}">
                    </div>

                    <div class="popup-input mt-4">
                        <input type="date" placeholder="End date" id="end_date" name="end_date"
                            value="{{ old('end_date') }}">
                    </div>

                    <div class="popup-input ms-2 mt-4">
                        <button type="submit" class="btn-submit">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<output id="output"></output>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var form = document.getElementById("filter");
var filter_url = "";
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

        var url = '/package/filter/list/' + Object.keys(params).map(
            // var url = 'http://localhost:8000/package/filter/list/' + Object.keys(params).map(
            function(key) {
                return key + '=' + params[key].join(',');
            }).join('+');

        window.location.href = url;
    });
});

$(function() {
    $('#filter_sort').change(function(e) {
        var selectedOption = e.target.options[e.target.selectedIndex];
        var selectedValue = selectedOption.value;
        var selectedUrl = selectedOption.getAttribute('data-url');
        package_filter(1, selectedUrl);
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
    }
});

function package_filter(page, filter_url) {
    var sort_optionSelect = document.querySelector('select[name="filter_sort"]');
    if (sort_optionSelect !== null) {
        var sort_option = sort_optionSelect.value;
    }
    $.ajax({
        url: "{{ url('package/filter/pagination/') }}",
        method: "POST",
        headers: {
            "Accept": "application/json",
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        data: {
            filterUrl: filter_url,
            page: page,
            sort_option: sort_option
        },
        success: function(res) {
            var elems = document.getElementById('filter_list');
            elems.innerHTML = `<div></div>`;
            console.log((res.filter_data).length);
            for (var i = 0; i < (res.filter_data).length; i++) {

                elems.innerHTML += `
                        <div class="ddd row list">
                        <div class="col-md-3 dard ps-0">
                            <div class="mal" style="height: 100%">
                                <img style="height: 100%" src="{{ asset("uploads/") }}/${res.filter_data[i].p_photo}" alt="">
                            </div>
                            
                        </div>
                        <div class="col-md-6 tnam">
                            <div class="lock">

                                <h6>${parseInt(res.filter_data[i].p_travel_day)} Nights / ${parseInt(res.filter_data[i].p_travel_day) + 1 } Days</h6>
                                <h5>${res.filter_data[i].p_name} from ${res.filter_data[i].p_started_from} - ${ parseInt(res.filter_data[i].p_travel_day) } Nights
                                    ${ parseInt(res.filter_data[i].p_travel_day) + 1 } Days</h5>
                                <span id="travel_guide" guidekey="${i}"></span>
                                <div id="travel_accomodation" class="row" key="${i}"></div>
                                <h4 typekey=${i} class="pt-3 tika"></h4>
                            </div>
                        </div>

                        <div class="col-md-3 mekong">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <h5>$ ${res.filter_data[i].p_price}</h5>
                                        <p>per adult on twin sharing</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="get">
                                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Quotes ></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                var elems_accomodation = document.querySelector(`div[key="${i}"]`);
                var elems_guide = document.querySelector(`span[guidekey="${i}"]`);
                var elems_type = document.querySelector(`h4[typekey="${i}"]`);
                var count = ((res.filter_data[i].p_travel_guide).split(",")).length;

                for (var j = 0; j < ((res.filter_data[i].p_travel_guide).split(",")).length; j++) {
                    if (j != count - 1) {
                        elems_guide.innerHTML += `
                            ${((res.filter_data[i].p_travel_guide).split(","))[j]} → 
                        `;
                    } else {
                        elems_guide.innerHTML += `
                            ${((res.filter_data[i].p_travel_guide).split(","))[j]}
                        `;
                    }
                }

                for (var j = 0; j < ((res.filter_data[i].p_travel_type).split(",")).length; j++) {
                    elems_type.innerHTML += `
                        <span><i class="bi bi-arrow-up-right"></i></span> ${((res.filter_data[i].p_travel_type).split(","))[j]}<br></br>
                    `;
                }

                for (var j = 0; j < ((res.filter_data[i].p_travel_accomodation).split(",")).length; j++) {
                    elems_accomodation.innerHTML += `
                    <div class="col-md-4">
                        <div>
                        <i class="bi bi-house-lock-fill"></i>
                        <h6><span>${((res.filter_data[i].p_travel_accomodation).split(","))[j]}</span></h6>
                        </div>
                    </div>
                    `;
                }

            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX error:", error);
        }
    })
}

function reset() {
    window.location.href = '/package/filter/list/';
    // window.location.href = 'http://localhost:8000/package/filter/list/';
}

function filter_option() {
    const form = document.getElementById("filter");
}
</script>

@endsection