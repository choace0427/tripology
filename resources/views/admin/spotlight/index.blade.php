@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Spotlight Text</h1>

    <form action="{{ route('admin.spotlight.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Update Spotlight Content</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Spotlight Heading</label>
                    <input type="text" name="spotlight_heading" class="form-control" value="@if($spotlight->spotlight_heading) {{$spotlight->spotlight_heading }} @else {{ old('spotlight_heading') }}@endif" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Spotlight Text</label>
                    <textarea name="spotlight_text" class="form-control h_100" cols="30" rows="10">@if($spotlight->spotlight_text) {{$spotlight->spotlight_text }} @else {{ old('spotlight_text') }}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="">Spotlight Deal Text</label>
                    <textarea name="spotlight_deal_text" class="form-control editor" cols="30" rows="10">@if($spotlight->spotlight_deal_text) {{$spotlight->spotlight_deal_text }} @else {{ old('spotlight_deal_text') }}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="">Spotlight Facilities</label>
                    <textarea name="spotlight_facilities" class="form-control editor" cols="30" rows="10">@if($spotlight->spotlight_facilities) {{$spotlight->spotlight_facilities }} @else {{ old('spotlight_facilities') }}@endif</textarea>

                </div>
                @if($spotlight->spotlight_facilities_photo)
                <div class="form-group">
                    <label for="">Existing Spotlight Facilities Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$spotlight->spotlight_facilities_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label for="">Spotlight Facilities Photo *</label>
                    <div>
                        <input type="file" name="spotlight_facilities_photo">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
