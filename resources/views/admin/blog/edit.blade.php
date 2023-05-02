@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Blog</h1>

    <form action="{{ url('admin/blog/update/'.$blog->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_photo" value="{{ $blog->blog_photo }}">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Blog</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Blog Name *</label>
                    <input type="text" name="blog_title" class="form-control" value="{{ $blog->blog_title }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Blog Slug</label>
                    <input type="text" name="blog_slug" class="form-control" value="{{ $blog->blog_slug }}">
                </div>
                <div class="form-group">
                    <label for="">Blog Content *</label>
                    <textarea name="blog_content" class="form-control editor" cols="30" rows="10">{{ $blog->blog_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Blog Short Content *</label>
                    <textarea name="blog_content_short" class="form-control h_100" cols="30" rows="10">{{ $blog->blog_content_short }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Existing Blog Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$blog->blog_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Blog Photo</label>
                    <div>
                        <input type="file" name="blog_photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Select Category *</label>
                            <select name="category_id" class="form-control">
                                @foreach($category as $row)
                                    <option value="{{ $row->id }}" @if($row->id == $blog->category_id) selected @endif>{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Show Comment? *</label>
                            <select name="comment_show" class="form-control">
                                <option value="Yes" @if($blog->comment_show == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if($blog->comment_show == 'No') selected @endif>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $blog->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $blog->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
