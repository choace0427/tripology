@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Packages</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Packages</h6>
            <div class="float-right d-inline">
                <a href="{{ route('agency.package.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Package Name</th>
                        <th>Destination Name</th>
                        <th>Total People Registered</th>
                        <th>
                            Photo
                        </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=0; $row = ''; $item = ''; @endphp
                    @foreach($package as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads/'.$row->p_photo) }}" alt="" class="w_200"></td>
                            <td>{{ $row->p_name }}</td>
                            <td>{{ $row->destination->d_name }}</td>
                            <td>
                                @php
                                    $total_per = 0;
                                    $data_list = App\Models\Admin\Order::where('package_id',$row->id)->where('payment_status','Completed')->get();
                                @endphp
                                @foreach($data_list as $item)
                                    @php $total_per = $total_per + $item->total_person @endphp
                                @endforeach
                                {{ $total_per }}
                            </td>
                            <td>
                                <a href="{{ URL::to('admin/package/photo/'.$row->id) }}" class="btn btn-success btn-sm btn-block w_150">Manage Photos</a>
                                <a href="{{ URL::to('admin/package/schedule/'.$row->id) }}" class="btn btn-success btn-sm btn-block w_150">Manage Schedules</a>
                                <a href="{{ URL::to('admin/package/itinerary/'.$row->id) }}" class="btn btn-success btn-sm btn-block w_150">Manage Itineraries</a> 
                            </td>
                            <td class="w_100">
                                <a href="{{ URL::to('admin/package/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('admin/package/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
