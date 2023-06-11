@extends('admin.admin_layouts')
@section('admin_content')

    @php
        $package_row = DB::table('packages')->where('id', $package_id)->first();
    @endphp

    <h1 class="h3 mb-3 text-gray-800">Schedules of {{ $package_row->p_name }}</h1>
    <form action="{{ route('agency.package.schedule-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="package_id" value="{{ $package_id }}">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Package Schedule</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('agency.package.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back to Package Page</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input id="txtstartdate" autocomplete="off" type="text" name="start_date" class="form-control" value="{{ old('start_date') }}">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input id="txtenddate" autocomplete="off" type="text" name="end_date" class="form-control" value="{{ old('end_date') }}">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" autocomplete="off" name="price" class="form-control" value="{{ old('price') }}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">All Existing Schedules</h6>
            <div class="float-right d-inline">
                <a href="{{ route('agency.package.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back to Package Page</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($package_schedule as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->start_date }}</td>
                            <td>{{ $row->end_date }}</td>
                            <td>{{ $row->price }}</td>
                            <td>
                                <a href="{{ URL::to('agency/package/schedule-delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection