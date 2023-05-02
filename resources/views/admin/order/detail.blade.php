@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Order Detail</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Order Information</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Order Number</b></td>
                                <td>{{ $order_detail->order_no }}</td>
                            </tr>
                            <tr>
                                <td><b>Transaction Id</b></td>
                                <td>{{ $order_detail->txnid }}</td>
                            </tr>
                            <tr>
                                <td><b>Price</b></td>
                                <td><i class="{{ $order_detail->original_currency_sign }}"></i> {{ $order_detail->original_price }}</td>
                            </tr>
                            <tr>
                                <td><b>Currency</b></td>
                                <td>{{ $order_detail->original_currency_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Paid Amount</b></td>
                                <td>$ {{ $order_detail->paid_amount }}</td>
                            </tr>
                            <tr>
                                <td><b>Fee Amount</b></td>
                                <td>$ {{ $order_detail->fee_amount }}</td>
                            </tr>
                            <tr>
                                <td><b>Net Amount</b></td>
                                <td>$ {{ $order_detail->net_amount }}</td>
                            </tr>
                            <tr>
                                <td><b>Payment Method</b></td>
                                <td>{{ $order_detail->payment_method }}</td>
                            </tr>

                            @if($order_detail->payment_method == 'Stripe')
                            <tr>
                                <td><b>Card Last 4 Digits</b></td>
                                <td>{{ $order_detail->card_last4 }}</td>
                            </tr>
                            <tr>
                                <td><b>Card Expire Month</b></td>
                                <td>{{ $order_detail->card_exp_month }}</td>
                            </tr>
                            <tr>
                                <td><b>Card Expire Year</b></td>
                                <td>{{ $order_detail->card_exp_year }}</td>
                            </tr>
                            @endif

                            <tr>
                                <td><b>Payment Status</b></td>
                                <td>{{ $order_detail->payment_status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
