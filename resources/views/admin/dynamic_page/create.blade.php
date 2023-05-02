@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Dynamic Page</h1>

    <form action="{{ route('admin.dynamic_page.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Dynamic Page</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.dynamic_page.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="dynamic_page_name" class="form-control" value="{{ old('dynamic_page_name') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="dynamic_page_slug" class="form-control" value="{{ old('dynamic_page_slug') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="dynamic_page_content" class="form-control editor" cols="30" rows="10">{{ old('dynamic_page_content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Banner *</label>
                    <div>
                        <input type="file" name="dynamic_page_banner">
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
