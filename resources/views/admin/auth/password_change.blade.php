@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Password</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('admin/password-change/update') }}" method="post">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Password</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">New Password *</label>
                            <input type="password" name="password" class="form-control" value="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Retype Password *</label>
                            <input type="password" name="re_password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>

@endsection
