@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Destination</h1>

    <form action="{{ route('admin.destination.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Destination</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.destination.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Parent</label>
                    <!--select name="d_parent_id" class="form-control select2">
                        @forelse($parents as $keyParent => $parent)
                            <optgroup label="{{ $parent->d_name }}">
                                <option value="{{ $parent->id }}">{{ $parent->d_name }}</option>
                                    @foreach($parents as $keyChild => $sub)
                                        @if($sub->d_parent_id === $parent->id)
                                            @unset($parents[$keyChild])
                                            <option value="{{ $sub->id }}">--{{ $sub->d_name }}</option>
                                        @endif
                                    @endforeach
                            </optgroup>
                            @empty
                        @endforelse   
                    </select-->
                    <select class="form-control" data-toggle="select" data-live-search="true" name="d_parent_id" id="d_parent_id">

                            @foreach($parents as $category)
                                    <option value="{{ $category->id }}">{{ $category->d_name }}</option>
                                        @foreach($category->children as $child)
                                            <option value="{{ $child->id }}">-- {{ $child->d_name }}</option>
                                        @endforeach
                            @endforeach
                    </select>

                    
                </div>
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="d_name" class="form-control" value="{{ old('d_name') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="d_slug" class="form-control" value="{{ old('d_slug') }}">
                </div>
                <div class="form-group">
                    <label for="">Heading</label>
                    <input type="text" name="d_heading" class="form-control" value="{{ old('d_heading') }}">
                </div>
                <div class="form-group">
                    <label for="">Short Description</label>
                    <textarea name="d_short_description" class="form-control h_100" cols="30" rows="10">{{ old('d_short_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Package Heading</label>
                    <input type="text" name="d_package_heading" class="form-control" value="{{ old('d_package_heading') }}">
                </div>
                <div class="form-group">
                    <label for="">Package Subheading</label>
                    <input type="text" name="d_package_subheading" class="form-control" value="{{ old('d_package_subheading') }}">
                </div>
                <div class="form-group">
                    <label for="">Detail Heading</label>
                    <input type="text" name="d_detail_heading" class="form-control" value="{{ old('d_detail_heading') }}">
                </div>
                <div class="form-group">
                    <label for="">Detail Subheading</label>
                    <input type="text" name="d_detail_subheading" class="form-control" value="{{ old('d_detail_subheading') }}">
                </div>
                <div class="form-group">
                    <label for="">Photo *</label>
                    <div>
                        <input type="file" name="d_photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Introduction</label>
                    <textarea name="d_introduction" class="form-control editor" cols="30" rows="10">{{ old('d_introduction') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Experience</label>
                    <textarea name="d_experience" class="form-control editor" cols="30" rows="10">{{ old('d_experience') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Weather</label>
                    <textarea name="d_weather" class="form-control editor" cols="30" rows="10">{{ old('d_weather') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Hotel</label>
                    <textarea name="d_hotel" class="form-control editor" cols="30" rows="10">{{ old('d_hotel') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Transportation</label>
                    <textarea name="d_transportation" class="form-control editor" cols="30" rows="10">{{ old('d_transportation') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Culture</label>
                    <textarea name="d_culture" class="form-control editor" cols="30" rows="10">{{ old('d_culture') }}</textarea>
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
