@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Quotes</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Quotes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Package Name</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Start Date</th>
                        <th>Start End</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->package->p_name }}</td>
                            <td>{{ $row->traveller->traveller_name}}</td>
                            <td>{{ $row->traveller->traveller_phone }}</td>
                            <td>{{ $row->traveller->traveller_email }}</td>
                            <td>{{ $row->start_date }}</td>
                            <td>{{ $row->end_date }}</td>
                            <!-- <td>{{ $row->published }}</td> -->
                            <td>
                                <a href="{{url('/agency/quotes',$row->id)}}" class="btn btn-info btn-sm">Send Quotation</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<style>
.stars-active{color:#EEBD01}
</style>