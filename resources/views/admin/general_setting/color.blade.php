@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Color Information</h1>

    <form action="{{ url('admin/setting/general/color/update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Theme Color</label>
                            <input type="text" name="theme_color" class="form-control jscolor" value="{{ $general_setting->theme_color }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection