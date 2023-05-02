@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Currency Setting</h1>

    <form action="{{ url('admin/currency/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Currency Name</label>
                            <input type="text" name="currency_name" class="form-control" value="{{ $general_setting->currency_name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Currency Sign Preview</label>
                            <div>
                                <i class="{{ $general_setting->currency_sign }}"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Currency Sign (Font Awesome 5 Free Icon)</label>
                            <input type="text" name="currency_sign" class="form-control" value="{{ $general_setting->currency_sign }}">
                        </div>
                        <div class="form-group">
                            <label for="">Currency value (per USD)</label>
                            <input type="text" name="currency_per_usd_value" class="form-control" value="{{ $general_setting->currency_per_usd_value }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection