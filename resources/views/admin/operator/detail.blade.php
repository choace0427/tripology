@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Operator Detail</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Operator Details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if($operator_detail->photo)
                            <tr>
                                <td style='width:20%;'>Photo</td>
                                <td><img src="{{ asset('uploads/'.$operator_detail->photo) }}" alt="" class="w_200"></td>
                            </tr>
                            @endif
                            <tr>
                                <td>Name</td>
                                <td>{{ $operator_detail->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $operator_detail->email }}</td>
                            </tr>
                            <tr>
                                <td>Company Name</td>
                                <td>{{ $operator_detail->company_name }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>{{ $operator_detail->username }}</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>{{ $operator_detail->website }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $operator_detail->phone }}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{ $operator_detail->city }}</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>{{ $operator_detail->country }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $operator_detail->description }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $operator_detail->status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection