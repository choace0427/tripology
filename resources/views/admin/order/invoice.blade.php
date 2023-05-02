@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800 invoice-heading">Order Invoice</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary invoice-heading">Order Invoice</h6>
                </div>
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-5">
                                    <span>
                                        <img src="{{ asset('uploads/'.$g_setting->logo) }}" alt="" class="h_70">
                                    </span>
                                </div>
                                <div class="iv-right col-7 text-md-right">
                                    <div>
                                        <span>
                                            Invoice No: {{ $order_detail->order_no }}</span>
                                        <div class="mt_10">
                                            <a href="javascript:window.print();" class="btn btn-info btn-sm mr_5 print-invoice-button">Print Invoice</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="invoice-address">
                                    <h5>Invoiced To</h5>
                                    <p>Name: {{ $order_detail->traveller_name }}</p>
                                    <p>Email: {{ $order_detail->traveller_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="invoice-address">
                                    <h5>Payment Data</h5>
                                    <p>Payment Method: {{ $order_detail->payment_method }}</p>
                                    <p>Payment Status: {{ $order_detail->payment_status }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-right">
                                <ul class="invoice-address">
                                    <h5>Invoice Date & Time</h5>
                                    <p>
                                        Date: 
                                        {{ \Carbon\Carbon::parse($order_detail->created_at)->format('d M, Y') }}
                                    </p>
                                    <p>
                                        Time: 
                                        {{ \Carbon\Carbon::parse($order_detail->created_at)->format('H:i:s A') }}
                                    </p>
                                </ul>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-address mt-5">
                                    <h5>Package Details</h5>
                                </div>
                                <div class="table-responsive invoice-table">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>Package Name</b></th>
                                                <th><b>Destination Name</b></th>
                                                <th><b>Package Price</b></th>
                                                <th><b>Total Persons</b></th>
                                                <th class="text-right"><b>Total Price</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @php
                                                $package_detail = DB::table('packages')->where('id', $order_detail->package_id)->first();
                                                $destination_detail = DB::table('destinations')->where('id', $package_detail->destination_id)->first();
                                                @endphp
                                                <td>{{ $package_detail->p_name }}</td>
                                                <td>{{ $destination_detail->d_name }}</td>
                                                <td>${{ $order_detail->paid_amount }}</td>
                                                <td>{{ $order_detail->total_person }}</td>
                                                <td class="text-right">${{ $order_detail->paid_amount *  $order_detail->total_person }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection