@extends('admin.admin_layouts')
@section('admin_content')

    @php
        $package_row = DB::table('packages')->where('id', $package_id)->first();
    @endphp

    <h1 class="h3 mb-3 text-gray-800">Photos of {{ $package_row->p_name }}</h1>
    <form action="{{ route('admin.package.photo-store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="package_id" value="{{ $package_id }}">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Package Photo</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.package.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back to Package Page</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Select Photo *</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">All Existing Photos</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.package.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back to Package Page</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($package_photo as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w_200"></td>
                            <td>
                                <a href="{{ URL::to('admin/package/photo-delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
