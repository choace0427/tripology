@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Subscribers</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Subscribers</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.subscriber.send_email') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Send Email to Subscribers</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subscriber Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriber as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->subs_email }}</td>
                            <td>
                                <a href="{{ URL::to('admin/subscriber/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection