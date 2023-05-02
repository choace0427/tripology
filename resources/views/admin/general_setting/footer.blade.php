@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Footer Information</h1>

    <form action="{{ url('admin/setting/general/footer/update') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Footer Address</label>
                            <textarea name="footer_address" class="form-control h_80" cols="30" rows="10">{{ $general_setting->footer_address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Footer Email</label>
                            <textarea name="footer_email" class="form-control h_80" cols="30" rows="10">{{ $general_setting->footer_email }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Footer Phone</label>
                            <textarea name="footer_phone" class="form-control h_80" cols="30" rows="10">{{ $general_setting->footer_phone }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Footer Copyright</label>
                            <input type="text" name="footer_copyright" class="form-control" value="{{ $general_setting->footer_copyright }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Footer Column 1 Heading</label>
                            <input type="text" name="footer_column1_heading" class="form-control" value="{{ $general_setting->footer_column1_heading }}">
                        </div>
                        <div class="form-group">
                            <label for="">Footer Column 1 Total Items</label>
                            <input type="text" name="footer_column1_total_item" class="form-control" value="{{ $general_setting->footer_column1_total_item }}">
                        </div>
                        <div class="form-group">
                            <label for="">Footer Column 2 Heading</label>
                            <input type="text" name="footer_column2_heading" class="form-control" value="{{ $general_setting->footer_column2_heading }}">
                        </div>
                        <div class="form-group">
                            <label for="">Footer Column 2 Total Items</label>
                            <input type="text" name="footer_column2_total_item" class="form-control" value="{{ $general_setting->footer_column2_total_item }}">
                        </div>
                        <div class="form-group">
                            <label for="">Footer Column 3 Heading</label>
                            <input type="text" name="footer_column3_heading" class="form-control" value="{{ $general_setting->footer_column3_heading }}">
                        </div>
                        <div class="form-group">
                            <label for="">Footer Column 3 Total Items</label>
                            <input type="text" name="footer_column3_total_item" class="form-control" value="{{ $general_setting->footer_column3_total_item }}">
                        </div>
                        <div class="form-group">
                            <label for="">Footer Column 4 Heading</label>
                            <input type="text" name="footer_column4_heading" class="form-control" value="{{ $general_setting->footer_column4_heading }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-block">Update</button>
            </div>
        </div>
    </form>

@endsection