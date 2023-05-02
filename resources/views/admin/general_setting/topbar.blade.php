@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Top Bar Information</h1>

    <form action="{{ url('admin/setting/general/topbar/update') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Top Bar Email</label>
                            <input type="text" name="top_bar_email" class="form-control" value="{{ $general_setting->top_bar_email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Top Bar Phone</label>
                            <input type="text" name="top_bar_phone" class="form-control" value="{{ $general_setting->top_bar_phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Top Bar Social Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_social_status" id="rr1" value="Show" @if($general_setting->top_bar_social_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_social_status" id="rr2" value="Hide" @if($general_setting->top_bar_social_status == 'Hide') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Top Bar Login Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_login_status" id="rr3" value="Show" @if($general_setting->top_bar_login_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr3">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_login_status" id="rr4" value="Hide" @if($general_setting->top_bar_login_status == 'Hide') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr4">Hide</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Top Bar Registration Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_registration_status" id="rr5" value="Show" @if($general_setting->top_bar_registration_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr5">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_registration_status" id="rr6" value="Hide" @if($general_setting->top_bar_registration_status == 'Hide') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr6">Hide</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Top Bar Cart Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_cart_status" id="rr7" value="Show" @if($general_setting->top_bar_cart_status == 'Show') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr7">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="top_bar_cart_status" id="rr8" value="Hide" @if($general_setting->top_bar_cart_status == 'Hide') checked @endif>
                                    <label class="form-check-label font-weight-normal" for="rr8">Hide</label>
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