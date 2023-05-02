@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Client</h1>

    <form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Client</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.client.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Photo *</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">URL</label>
                    <input type="text" name="url" class="form-control" value="{{ old('url') }}" autofocus>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
