@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Profile</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('admin/profile-change/update') }}" method="post">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Profile</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ $admin_data->name }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Email Address *</label>
                            <input type="text" name="email" class="form-control" value="{{ $admin_data->email }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>

@endsection
