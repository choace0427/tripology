@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Profile</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('agency/profile-change/update') }}" method="post">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Profile</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Company Name *</label>
                            <input type="text" name="company_name" class="form-control" value="{{ $agency_data->company_name }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">User Name *</label>
                            <input type="text" name="username" class="form-control" value="{{ $agency_data->username }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Website *</label>
                            <input type="text" name="website" class="form-control" value="{{ $agency_data->website }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ $agency_data->name }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Email Address *</label>
                            <input type="text" name="email" class="form-control" value="{{ $agency_data->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone *</label>
                            <input type="text" name="phone" class="form-control" value="{{ $agency_data->phone }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">City *</label>
                                <select class="form-control" name="city">
                                    <option value="">Select City</option>
                                    @foreach($city_names as $city)
                                    <option @if($agency_data->city == $city) selected @endif>{{$city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone *</label>
                            <input type="text" name="phone" class="form-control" value="{{ $agency_data->phone }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Description *</label>
                            <textarea name="description" class="form-control">{{ $agency_data->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>

@endsection
