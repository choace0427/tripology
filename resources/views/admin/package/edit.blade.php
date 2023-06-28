@extends('admin.admin_layouts')
@section('admin_content')
<h1 class="h3 mb-3 text-gray-800">Edit Package</h1>

<form action="{{ url('admin/package/update/'.$package->id) }}" id="addForm" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Pakage</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.package.index') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-arrow-left"></i> View All</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Name *</label>
                <input type="text" name="p_name" class="form-control" value="{{ $package->p_name }}" autofocus>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="p_slug" class="form-control" value="{{ $package->p_slug }}">
            </div>
            <div class="form-group">
                <label for="">Existing Photo</label>
                <div>
                    <img src="{{ asset('uploads/'.$package->p_photo) }}" alt="" class="w_300">
                </div>
            </div>
            <div class="form-group">
                <label for="">Photo *</label>
                <div>
                    <input type="file" name="p_photo">
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="p_description" class="form-control editor" cols="30"
                    rows="10">{{ $package->p_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Short Description</label>
                <textarea name="p_description_short" class="form-control h_100" cols="30"
                    rows="10">{{ $package->p_description_short }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <textarea name="p_location" class="form-control h_100" cols="30"
                    rows="10">{{ $package->p_location }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Started From *</label>
                <input type="text" name="p_started_from" class="form-control" value="{{ $package->p_started_from }}">
            </div>
            <div class="form-group">
                <label for="">Tour Operator *</label>
                <select name="p_tour_operator" class="form-control select2">
                    @foreach($agencies as $key => $agency)
                    <option value="{{ $key }}" @if($key==$package->p_tour_operator) selected @endif>{{ $agency }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Start Date</label>
                <input id="txtstartdate" type="text" autocomplete="off" name="p_start_date" class="form-control"
                    value="{{ $package->p_start_date }}">
            </div>
            <div class="form-group">
                <label for="">End Date</label>
                <input id="txtenddate" type="text" autocomplete="off" type="text" name="p_end_date" class="form-control"
                    value="{{ $package->p_end_date }}">
            </div>
            <div class="form-group">
                <label for="">Last Booking Date</label>
                <input id="txtlastdate" type="text" autocomplete="off" name="p_last_booking_date" class="form-control"
                    value="{{ $package->p_last_booking_date }}">
            </div>
            <div class="form-group">
                <label for="">Map</label>
                <textarea name="p_map" class="form-control h_100" cols="30" rows="10">{{ $package->p_map }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Itinerary</label>
                <textarea name="p_itinerary" class="form-control editor" cols="30"
                    rows="10">{{ $package->p_itinerary }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="p_price" class="form-control" value="{{ $package->p_price }}">
            </div>

            <div class="form-group">
                <label for="">Policy</label>
                <textarea name="p_policy" class="form-control editor" cols="30"
                    rows="10">{{ $package->p_policy }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Terms</label>
                <textarea name="p_terms" class="form-control editor" cols="30"
                    rows="10">{{ $package->p_terms }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Is Featured?</label>
                <select name="p_is_featured" class="form-control">
                    <option value="No" @if($package->p_is_featured == 'No') selected @endif>No</option>
                    <option value="Yes" @if($package->p_is_featured == 'Yes') selected @endif>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Max group size *</label>
                <select name="p_max_group_size" class="form-control select2">
                    @for($i = 1; $i <= 20; $i++ ) <option value="{{ $i }}" @if($i==$package->p_max_group_size) selected
                        @endif>{{ $i }}</option>
                        @endfor;
                </select>
            </div>
            <div class="form-group">
                <label for="">Age range *</label>
                <select name="p_age_range" class="form-control select2">
                    @foreach($ranges as $key => $range)
                    <option value="{{ $key }}" @if($key==$package->p_age_range) selected @endif>{{ $key }}</option>
                    @endforeach;
                </select>
            </div>
            <div class="form-group">
                <label for="">Destination</label>
                <select name="destination_id" class="form-control select2">
                    @foreach($destination as $row)
                    <option value="{{ $row->id }}" @if($row->id == $package->destination_id) selected
                        @endif>{{ $row->d_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Operated in *</label>
                <input type="text" name="p_operated_in" class="form-control" value="{{ $package->p_operated_in }}">
            </div>

            <div class="form-group">
                <label for="">Currrent Quote Form Backgroud Photo</label>
                <div>
                    <img src="{{ asset('uploads/'.$package->p_qoute_form_photo) }}" alt="" class="w_300">
                </div>
            </div>
            <div class="form-group">
                <label for="">Quote Form Backgroud Photo *</label>
                <div>
                    <input type="file" name="p_qoute_form_photo">
                </div>
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{ $package->seo_title }}">
            </div>
            <div class="form-group">
                <label for="">Meta Description</label>
                <textarea name="seo_meta_description" class="form-control h_100" cols="30"
                    rows="10">{{ $package->seo_meta_description }}</textarea>
            </div>

        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Package Filter Information</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Destination</label>
                <select name="destination_id" class="form-control select2">
                    @foreach($destination as $key => $row)
                    <option value="{{ $row->id }}">{{ $row->d_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Transposition</label>
                <select name="p_transposition_id" class="form-control select2">
                    @foreach($transposition as $row)
                    <option value="{{ $row->id }}" @if($row->id==$package->p_transposition_id) selected
                        @endif>{{ $row->filter_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Accomodation</label>
                <select name="p_accomodation_id" class="form-control select2">
                    @foreach($accomodation as $row)
                    <option value="{{ $row->id }}" @if($row->id==$package->p_accomodation_id) selected
                        @endif>{{ $row->filter_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Traveller</label>
                <select name="p_traveller_id" class="form-control select2">
                    @foreach($traveller_type as $row)
                    <option value="{{ $row->id }}" @if($row->id==$package->p_traveller_id) selected
                        @endif>{{ $row->filter_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Rating</label>
                <select name="p_rating" class="form-control select2">
                    @foreach($ratings as $row)
                    <option value="{{ $row->id }}" @if($row->id==$package->p_rating) selected
                        @endif>{{ $row->filter_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Distance</label>
                <select name="p_distance_id" class="form-control select2">
                    @foreach($distance as $row)
                    <option value="{{ $row->id }}" @if($row->id==$package->p_distance_id) selected
                        @endif>{{ $row->filter_name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="guide" name="guide" class="form-group">
                @php
                $travel_guide = explode(",", $package->p_travel_guide);
                $i = 0;
                @endphp
                @foreach ($travel_guide as $row)
                <div id="travel{{$i}}" class="form-group" style="display: flex; width: 100%">
                    <div name="travel" style="width: 100%; margin-right: 10px">
                        @if ($i == 0)
                        <label>Travel Guide</label>
                        @endif
                        <select name="travel_location{{$i}}" class="form-control select2">
                            @foreach($combine as $row1)
                            @php
                            $parts = explode("(", $row);
                            $first_part = substr($parts[0],0, -1);
                            $second_part = intval(substr($parts[1], 0, -2));
                            @endphp
                            <option value="{{ $row1->filter_name }}" @if($row1->filter_name==$first_part)
                                selected @endif>{{ $row1->filter_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        @if ($i == 0)
                        <label>Travel Days</label>
                        @endif
                        <div name="travel_day" style="display: flex; justify-content: space-between">
                            <input name="travel_day{{$i}}" type="number" style="margin-right: 15px" class="form-control"
                                value="{{$second_part}}">
                            @if($i ==0)
                            <span id="add" onclick="add_travel_guide()" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                            </span>
                            @else
                            <span id="add" onclick="remove_travel_guide({{$i}})" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                $i++;
                @endphp
                @endforeach
                <input type="hidden" name="guide_count" id="guide_count" value="{{$i}}">
            </div>

            <div id="travel_accomodation">
                @php
                $travel_accomodation = explode(",", $package->p_travel_accomodation);
                $i = 0;
                @endphp
                @foreach ($travel_accomodation as $row)
                @if($i == 0)
                <label for="">Travel Accomodation</label>
                @endif
                <div name="travel_accomodation" class="form-group" style="display:flex" id="travel_accomodation{{$i}}">
                    <input name="travel_accomodation{{$i}}" class="form-control" style="margin-right: 15px"
                        value="{{$row}}">
                    @if($i == 0)
                    <span id="add_accomodation" onclick="add_travel_accomodation()" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </span>
                    @else
                    <span id="remove_accomodation{{$i}}" onclick="remove_travel_accomodation({{$i}})"
                        class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </span>
                    @endif
                </div>
                @php
                $i++;
                @endphp
                @endforeach
                <input type="hidden" name="accomodation_count" id="accomodation_count" value="{{$i}}">
            </div>
            <div id="travel_type">
                @php
                $travel_type = explode(",", $package->p_travel_type);
                $i = 0;
                @endphp
                @foreach($travel_type as $row)
                @if($i == 0)
                <label for="">Travel Type (Type - Start - Destination)</label>
                @endif
                <div name="travel_type" class="form-group" id="travel_type{{$i}}"
                    style="display:flex; justify-content: space-between">

                    <select name="travel_type{{$i}}" class="form-control select2">
                        @foreach($transposition as $row1)
                        @php
                        $data1_arr = explode(" to ", $row);
                        $data1_type = substr($data1_arr[0], 0, strpos($data1_arr[0], " "));
                        $data1_dest1 = trim(substr($data1_arr[1], 0, strpos($data1_arr[1], "(")));
                        $data1_dest2 = trim(substr($data1_arr[1], strpos($data1_arr[1], "(") + 1, -1));
                        @endphp
                        <option value="{{ $row1->filter_name }}" @if($row1->filter_name==$data1_type)
                            selected @endif>{{ $row1->filter_name }}</option>
                        @endforeach
                    </select>
                    <select name="travel_start{{$i}}" class="form-control select2">
                        @foreach($combine as $row2)
                        <option value="{{ $row2->filter_name }}" @if($row2->filter_name==$data1_dest1)
                            selected @endif>{{ $row2->filter_name }}</option>
                        @endforeach
                    </select>
                    <select name="travel_destination{{$i}}" class="form-control select2">
                        @foreach($combine as $row3)
                        <option value="{{ $row2->filter_name }}" @if($row3->filter_name==$data1_dest2)
                            selected @endif>{{ $row3->filter_name }}</option>
                        @endforeach
                    </select>
                    @if ($i==0)
                    <span id="add_type" onclick="add_travel_type()" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </span>
                    @else
                    <span id="remove_type" onclick="remove_travel_type({{$i}})" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </span>
                    @endif
                </div>
                @php
                $i++;
                @endphp
                @endforeach
                <input type="hidden" name="type_count" id="type_count" value="{{$i}}">
            </div>
            <button id="submit" name="submit" class="btn btn-success">Update</button>
        </div>
    </div>
    </div>
</form>

<script>
var travel_accomodation_count = parseInt(document.getElementById('accomodation_count').value);
var travel_guide_count = parseInt(document.getElementById('guide_count').value);
var travel_type_count = parseInt(document.getElementById('type_count').value);
var add = document.getElementById("add");
var remove = document.getElementById("delete");
var guide = document.getElementById("guide");
var travel_location = [];

function add_travel_guide() {
    var newElem = `<div id="travel${travel_guide_count}" class="form-group" style="display: flex; width: 100%">
            <div name="travel" style="width: 100%; margin-right: 10px">
            <select name="travel_location${travel_guide_count}" style="width: 100%" class="form-control select2">
                @foreach($combine as $row)
                    <option value="{{ $row->filter_name }}">{{ $row->filter_name }}</option>
                @endforeach
            </select>
            </div>
            <div>
                <div style="display: flex; justify-content: space-between" name="travel_day">
                    <input name="travel_day${travel_guide_count}" type="number" style="margin-right: 15px" class="form-control"
                    value="0">
                    <span id="add" onclick="remove_travel_guide(${travel_guide_count})" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </span>
                </div>
            </div>
        </div>`;

    $('#guide').append(newElem);

    get_travel_guide_data(travel_guide_count);
    travel_guide_count++;
}

function add_travel_accomodation() {
    var newElem = `
        <div name="travel_accomodation" class="form-group" id="travel_accomodation${travel_accomodation_count}" style="display:flex">
        <input name="travel_accomodation${travel_accomodation_count}" class="form-control" style="margin-right: 15px">
        <span id="remove_accomodation" onclick="remove_travel_accomodation(${travel_accomodation_count})" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
        </span>
        </div>
    `;

    $('#travel_accomodation').append(newElem);
    get_travel_accomodation_data(travel_accomodation_count);
    travel_accomodation_count++;
}

function add_travel_type() {
    var newElem = `
        <div name="travel_type" class="form-group" id="travel_type${travel_type_count}" style="display:flex; justify-content: space-between">
            <select name="travel_type${travel_type_count}" class="form-control select2">
                @foreach($transposition as $row)
                <option value="{{ $row->filter_name }}">{{ $row->filter_name }}</option>
                @endforeach
            </select>
            <select name="travel_start${travel_type_count}" class="form-control select2">
                @foreach($combine as $row)
                <option value="{{ $row->filter_name }}">{{ $row->filter_name }}</option>
                @endforeach
            </select>
            <select name="travel_destination${travel_type_count}" class="form-control select2">
                @foreach($combine as $row)
                <option value="{{ $row->filter_name }}">{{ $row->filter_name }}</option>
                @endforeach
            </select>
            <span id="remove_type" onclick="remove_travel_type(${travel_type_count})" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
            </span>
        </div>
    `;
    $('#travel_type').append(newElem);
    get_travel_type_data(travel_type_count);
    travel_type_count++;
}

function remove_travel_type(count) {
    var elementToRemove = document.getElementById('travel_type' + count);
    elementToRemove.parentNode.removeChild(elementToRemove);
}

function remove_travel_guide(count) {
    var elementToRemove = document.getElementById('travel' + count);
    elementToRemove.parentNode.removeChild(elementToRemove);
}

function remove_travel_accomodation(count) {
    var elementToRemove = document.getElementById('travel_accomodation' + count);
    elementToRemove.parentNode.removeChild(elementToRemove);
}

function get_travel_type_data(travel_type_count) {
    var data = [];
    var elements = document.querySelectorAll('div[name="travel_type"]');
    if (elements.length > 0) {
        for (var i = 0; i < elements.length; i++) {
            var typeSelect = document.querySelector('select[name^="travel_type' + i + '"]');
            var startSelect = document.querySelector('select[name^="travel_start' + i + '"]');
            var destinationSelect = document.querySelector('select[name^="travel_destination' + i + '"]');
            if (typeSelect !== null && startSelect !== null && destinationSelect !== null) {
                var type = typeSelect.value;
                var start = startSelect.value;
                var destination = destinationSelect.value;
            }
            var travel_type = type + " Trip to " + " " + destination + " (" + start + ")";
            data.push(travel_type);
        }
    } else {
        var type = document.querySelector('select[name^="travel_type0"]').value;
        var start = document.querySelector('select[name^="travel_start0"]').value;
        var destination = document.querySelector('select[name^="travel_destination0"]').value;
        var travel_type = type + " Trip to " + " " + destination + " (" + start + ")";
        data.push(travel_type);
    }
    return {
        data: data,
    };
}

function get_travel_guide_data(travel_guide_count) {
    var data = [];
    var travel_day = 0;

    var elements = document.querySelectorAll('#guide div[name="travel"]');
    if (elements.length > 0) {
        for (var i = 0; i < elements.length; i++) {
            var locationSelect = document.querySelector('select[name="travel_location' + i + '"]');
            var daySelect = document.querySelector('input[name="travel_day' + i + '"]');
            if (locationSelect !== null && daySelect !== null) {
                var location = locationSelect.value;
                var day = daySelect.value;
            }
            var locationWithDay = location + " (" + day + "N)";
            data.push(locationWithDay);
            travel_day += parseInt(day);
        }
    } else {
        var locationSelect = document.querySelector('select[name^="travel_location0"]');
        var daySelect = document.querySelector('input[name="travel_day0"]');
        if (locationSelect !== null && daySelect !== null) {
            var location = locationSelect.value;
            var day = daySelect.value;
        }
        var locationWithDay = location + " (" + day + "N)";
        data.push(locationWithDay);
        travel_day = parseInt(day);
    }
    return {
        data: data,
        travel_day: travel_day
    };
}

function get_travel_accomodation_data(travel_accomodation_count) {
    var data = [];
    var elements = document.querySelectorAll('div[name="travel_accomodation"]');
    if (elements.length > 0) {
        for (var i = 0; i < elements.length; i++) {
            var accomodationSelect = document.querySelector('input[name="travel_accomodation' + i + '"]');
            if (accomodationSelect !== null) {
                var accomodation = accomodationSelect.value;
                // use the value of location here
            }
            data.push(accomodation);
        }
    } else {
        var accomodationSelect = document.querySelector('input[name="travel_accomodation0"]');
        if (accomodationSelect !== null) {
            var accomodation = accomodationSelect.value;
            // use the value of location here
        }
        data.push(accomodation);
    }
    return {
        data: data
    };
}

const submitter = document.querySelector("button[name=submit]");

submitter.addEventListener('click', (event) => {

    const form = document.getElementById("addForm");
    const formData = new FormData(form);
    event.preventDefault();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('p_travel_guide', get_travel_guide_data(travel_guide_count).data);
    formData.append('p_travel_day', get_travel_guide_data(travel_guide_count).travel_day);
    formData.append('p_travel_accomodation', get_travel_accomodation_data(travel_accomodation_count).data);
    formData.append('p_travel_type', get_travel_type_data(travel_type_count).data);
    fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            window.location.href = '/admin/package/view';
        })
        .catch(error => {
            // Handle error
        });
});
</script>

@endsection