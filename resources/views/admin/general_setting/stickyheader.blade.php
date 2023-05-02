@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Sticky Header Setting</h1>

    <form action="{{ url('admin/setting/general/stickyheader/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Sticky Header Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sticky_header_status" id="rr1" value="Show" @if($general_setting->sticky_header_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sticky_header_status" id="rr2" value="Hide" @if($general_setting->sticky_header_status == 'Hide') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection