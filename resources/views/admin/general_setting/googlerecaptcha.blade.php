@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Google Recaptcha Setting</h1>

    <form action="{{ url('admin/setting/general/googlerecaptcha/update') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Google Recaptcha Site Key</label>
                            <input type="text" name="google_recaptcha_site_key" class="form-control" value="{{ $general_setting->google_recaptcha_site_key }}">
                        </div>
                        <div class="form-group">
                            <label for="">Google Recaptcha Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="google_recaptcha_status" id="rr1" value="Show" @if($general_setting->google_recaptcha_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="google_recaptcha_status" id="rr2" value="Hide" @if($general_setting->google_recaptcha_status == 'Hide') checked @endif>
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
