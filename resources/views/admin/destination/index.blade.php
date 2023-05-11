@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Destinations</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Destinations</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.destination.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Destination Name</th>
                        <th>Destination Parent</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($destination as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('uploads/'.$row->d_photo) }}" alt="" class="w_200">
                            </td>
                            <td>{{ $row->d_name }}</td>
                            <td>{{ ($row->d_parent_id != 0) ? $row->parent->d_name: '-'}}</td>
                            <td>
                                <a href="{{ URL::to('admin/destination/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('admin/destination/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
