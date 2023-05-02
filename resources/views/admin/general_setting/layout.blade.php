@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Layout Information</h1>

    <form action="{{ url('admin/setting/general/layout/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Layout Direction</label>
                            <select name="layout_direction" class="form-control">
                                <option value="Left to Right" @if($g_setting->layout_direction == 'Left to Right') selected @endif>Left to Right (LTR)</option>
                                <option value="Right to Left" @if($g_setting->layout_direction == 'Right to Left') selected @endif>Right to Left (RTL)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection