@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Banner</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">About Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_about }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_about) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_about">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Service Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_service }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_service) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_service">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Service Detail Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_service_detail }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_service_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_service_detail">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Blog Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_blog }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_blog) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_blog">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Blog Detail Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_blog_detail }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_blog_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_blog_detail">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Category Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_category }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_category) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_category">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Team Member Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_team_member }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_team_member) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_team_member">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Team Member Detail Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_team_member_detail }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_team_member_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_team_member_detail">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">FAQ Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_faq }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_faq) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_faq">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
       
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Contact Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_contact }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_contact) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_contact">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Search Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_search }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_search) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_search">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Payment Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_payment }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_payment) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_payment">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Login Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_login }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_login) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_login">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Registration Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_registration }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_registration) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_registration">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Forget Password Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_forget_password }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_forget_password) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_forget_password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Term Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_term }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_term) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_term">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Privacy Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_privacy }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_privacy) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_privacy">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Testimonial Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_testimonial }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_testimonial) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_testimonial">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Destination Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_destination }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_destination) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_destination">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Destination Detail Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_destination_detail }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_destination_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_destination_detail">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Package Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_package }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_package) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_package">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Package Detail Page Banner</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting/general/banner/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="current_photo" value="{{ $general_setting->banner_package_detail }}">
                        <div class="form-group">
                            <label for="">Existing Banner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$general_setting->banner_package_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Change Banner</label>
                            <div>
                                <input type="file" name="banner_package_detail">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
