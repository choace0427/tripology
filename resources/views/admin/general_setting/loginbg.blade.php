@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Login Background</h1>

    <form action="{{ url('admin/setting/general/loginbg/update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="current_photo" value="{{ $general_setting->login_bg }}">

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Existing Favicon</label>
                    <div>
                        <img src="{{ asset('uploads/'.$general_setting->login_bg) }}" alt="" class="w_300">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Favicon</label>
                    <div>
                        <input type="file" name="login_bg">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection