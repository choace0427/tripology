@extends('admin.admin_layouts')
@section('admin_content')
<h1 class="h3 mb-3 text-gray-800">Filter Options</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Filter Options</h6>
        <div class="float-right d-inline">
            <a href="{{ route('admin.filter.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add
                New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Filter Name</th>
                        <th>Filter Type</th>
                        <th>Fitler Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0; $item = ''; @endphp
                    @foreach ($filter as $row)
                    @php $i++; @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$row->filter_name}}
                        <td>{{$row->filter_type}}
                        <td>{{$row->filter_slug}}
                        <td class="w_100">
                            <a href="{{ URL::to('admin/filter/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ URL::to('admin/filter/delete/'.$row->id) }}" class="btn btn-danger btn-sm"
                                onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection