@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Operators</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Operators</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <td>Company Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operators as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- <td><img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w_200"></td> -->
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->company_name }}</td>
                            <td>
                                @if($row->status == '1')
                                    <span class="text-success">Active</span>
                                @endif

                                @if($row->status == '0')
                                    <span class="text-danger">Pending</span>
                                @endif                                
                            </td>
                            <td>
                                <a href="{{ URL::to('admin/operators/detail/'.$row->id) }}" class="btn btn-info btn-sm btn-block">Detail</a>
                                @if($row->status == 'Active')
                                    <a href="{{ URL::to('admin/operators/make-pending/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure?');">Make Pending</a>
                                @else
                                    <a href="{{ URL::to('admin/operators/make-active/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure?');">Make Active</a>
                                @endif
                                <a href="{{ URL::to('admin/operators/delete/'.$row->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
