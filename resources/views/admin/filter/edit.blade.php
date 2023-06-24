@extends('admin.admin_layouts')
@section('admin_content')
<h1 class="h3 mb-3 text-gray-800">Edit Filter Option</h1>

<form action="{{ url('admin/filter/update/'.$filter->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Filter Option</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.filter.index') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-arrow-left"></i> View All</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="filter_name">Name *</label>
                <input type="text" name="filter_name" class="form-control" value="{{ $filter->filter_name }}" autofocus>
            </div>
            <div class="form-group">
                <label for="filter_slug">Slug</label>
                <input type="text" name="filter_slug" class="form-control" value="{{ $filter->filter_slug }}">
            </div>
            <div class="form-group">
                <label for="filter_type">Filter Type *</label>
                <select name="filter_type" class="form-control select2">
                    @foreach($filter_type as $row)
                    <option value="{{ $row->filter_type }}"
                        {{ $selected[0]->filter_type == $row->filter_type ? 'selected' : '' }}>
                        {{ $row->filter_type }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>

@endsection