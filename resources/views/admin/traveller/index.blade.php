@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Travellers</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Travellers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Traveller Name</th>
                        <th>Traveller Email</th>
                        <th>Traveller Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($travellers as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->traveller_name }}</td>
                            <td>{{ $row->traveller_email }}</td>
                            <td>
                                @if($row->traveller_status == 'Active')
                                    <span class="text-success">{{ $row->traveller_status }}</span>
                                @endif

                                @if($row->traveller_status == 'Pending')
                                    <span class="text-danger">{{ $row->traveller_status }}</span>
                                @endif                                
                            </td>
                            <td>
                                <a href="{{ URL::to('admin/traveller/detail/'.$row->id) }}" class="btn btn-info btn-sm btn-block">Detail</a>
                                @if($row->traveller_status == 'Active')
                                    <a href="{{ URL::to('admin/traveller/make-pending/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure?');">Make Pending</a>
                                @else
                                    <a href="{{ URL::to('admin/traveller/make-active/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure?');">Make Active</a>
                                @endif
                                <a href="{{ URL::to('admin/traveller/delete/'.$row->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
