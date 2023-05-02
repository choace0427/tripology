@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Orders</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-success">
                            <th>SL</th>
                            <th>Traveller Detail</th>
                            <th>Package</th>
                            <th>Destination</th>
                            <th>Order Number</th>
                            <th>Price</th>
                            <th>Currency</th>
                            <th>Paid Amount</th>
                            <th>Payment Method</th>
                            <th>Total Persons</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $traveller_data = DB::table('travellers')->where('id', $row->traveller_id)->first();
                                        
                                    @endphp
                                    <b>Name:</b> <br>
                                    {{ $traveller_data->traveller_name }} <br><br>
                                    <b>Email:</b> <br>
                                    {{ $traveller_data->traveller_email }}
                                    <div><a href="{{ URL::to('admin/traveller/detail/'.$traveller_data->id) }}" class="btn btn-primary btn-sm mt_10" target="_blank">See Detail</a></div>
                                </td>
                                <td>
                                    @php
                                        $package_data = DB::table('packages')->where('id', $row->package_id)->first();
                                    @endphp
                                    {{ $package_data->p_name }}
                                    <div><a href="{{ URL::to('package/'.$package_data->p_slug) }}" class="btn btn-primary btn-sm mt_10" target="_blank">See Detail</a></div>
                                </td>
                                <td>
                                    @php
                                        $destination_data = DB::table('destinations')->where('id', $package_data->destination_id)->first();
                                    @endphp
                                    {{ $destination_data->d_name }}
                                    <div><a href="{{ URL::to('destination/'.$destination_data->d_slug) }}" class="btn btn-primary btn-sm mt_10" target="_blank">See Detail</a></div>
                                </td>
                                <td>{{ $row->order_no }}</td>
                                <td><i class="{{ $row->original_currency_sign }}"></i> {{ $row->original_price }}</td>
                                <td>{{ $row->original_currency_name }}</td>
                                <td>${{ $row->paid_amount }}</td>
                                <td>{{ $row->payment_method }}</td>
                                <td>{{ $row->total_person }}</td>
                                <td>
                                    <a href="{{ URL::to('admin/order/detail/'.$row->id) }}" class="btn btn-success btn-sm btn-block" target="_blank">Detail</a>
                                    <a href="{{ URL::to('admin/order/invoice/'.$row->id) }}" class="btn btn-info btn-sm btn-block" target="_blank">Invoice</a>
                                    <a href="{{ URL::to('admin/order/delete/'.$row->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
