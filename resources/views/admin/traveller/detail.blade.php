@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Traveller Detail</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Traveller Details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Traveller Name</td>
                                <td>{{ $traveller_detail->traveller_name }}</td>
                            </tr>
                            <tr>
                                <td>Traveller Email</td>
                                <td>{{ $traveller_detail->traveller_email }}</td>
                            </tr>
                            <tr>
                                <td>Traveller Phone</td>
                                <td>{{ $traveller_detail->traveller_phone }}</td>
                            </tr>
                            <tr>
                                <td>Traveller Country</td>
                                <td>{{ $traveller_detail->traveller_country }}</td>
                            </tr>
                            <tr>
                                <td>Traveller Address</td>
                                <td>{{ $traveller_detail->traveller_address }}</td>
                            </tr>
                            <tr>
                                <td>Traveller State</td>
                                <td>{{ $traveller_detail->traveller_state }}</td>
                            </tr>
                            <tr>
                                <td>Traveller City</td>
                                <td>{{ $traveller_detail->traveller_city }}</td>
                            </tr>
                            <tr>
                                <td>Traveller Zip</td>
                                <td>{{ $traveller_detail->traveller_zip }}</td>
                            </tr>
                            <tr>
                                <td>Traveller Status</td>
                                <td>{{ $traveller_detail->traveller_status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection