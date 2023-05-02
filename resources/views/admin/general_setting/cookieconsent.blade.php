@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Cookie Consent Setting</h1>

    <form action="{{ url('admin/setting/general/cookieconsent/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="cookie_consent_message" class="form-control h_100" cols="30" rows="10">{{ $general_setting->cookie_consent_message }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Button Text</label>
                            <input type="text" name="cookie_consent_button_text" class="form-control" value="{{ $general_setting->cookie_consent_button_text }}">
                        </div>
                        <div class="form-group">
                            <label for="">Text Color</label>
                            <input type="text" name="cookie_consent_text_color" class="form-control jscolor" value="{{ $general_setting->cookie_consent_text_color }}">
                        </div>
                        <div class="form-group">
                            <label for="">Background Color</label>
                            <input type="text" name="cookie_consent_bg_color" class="form-control jscolor" value="{{ $general_setting->cookie_consent_bg_color }}">
                        </div>
                        <div class="form-group">
                            <label for="">Button Text Color</label>
                            <input type="text" name="cookie_consent_button_text_color" class="form-control jscolor" value="{{ $general_setting->cookie_consent_button_text_color }}">
                        </div>
                        <div class="form-group">
                            <label for="">Button Background Color</label>
                            <input type="text" name="cookie_consent_button_bg_color" class="form-control jscolor" value="{{ $general_setting->cookie_consent_button_bg_color }}">
                        </div>
                        <div class="form-group">
                            <label for="">Cookie Consent Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cookie_consent_status" id="rr1" value="Show" @if($general_setting->cookie_consent_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cookie_consent_status" id="rr2" value="Hide" @if($general_setting->cookie_consent_status == 'Hide') checked @endif>
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