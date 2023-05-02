@extends('layouts.app')

@section('content')

<div class="dashboard-area bg-area pt_50 pb_80">
    <div class="container wow fadeIn">
        <div class="row">

            @include('traveller.pages.check_profile_data')
            
            <div class="col-md-3 col-sm-12 wow fadeIn" data-wow-delay="0.1s">
                <div class="option-board mt_30">
                    <ul>
                        @include('layouts.sidebar_traveller')
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
                <div class="detail-dashboard table-responsive mt_30">

                    <h1>{{ ORDER_DETAIL }}</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered order-detail-table" width="100%" cellspacing="0">
                            <tr>
                                <td class="table-primary w_200">{{ ORDER_NO }}</td>
                                <td>{{ $order_detail->order_no }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ TRANSACTION_ID }}</td>
                                <td>{{ $order_detail->txnid }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ PRICE }}</td>
                                <td><i class="{{ $order_detail->original_currency_sign }}"></i> {{ number_format($order_detail->original_price,2) }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ CURRENCY }}</td>
                                <td>{{ $order_detail->original_currency_name }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ PAID_AMOUNT }}</td>
                                <td>$ {{ number_format($order_detail->paid_amount,2) }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ PAYMENT_DATE }}</td>
                                <td>{{ \Carbon\Carbon::parse($order_detail->created_at)->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ PAYMENT_METHOD }}/td>
                                <td>{{ $order_detail->payment_method }}</td>
                            </tr>

                            @if($order_detail->payment_method == 'Stripe')
                            <tr>
                                <td class="table-primary">{{ CARD_LAST4_DIGIT }}</td>
                                <td>{{ $order_detail->card_last4 }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ CARD_EXP_MONTH }}</td>
                                <td>{{ $order_detail->card_exp_month }}</td>
                            </tr>
                            <tr>
                                <td class="table-primary">{{ CARD_EXP_YEAR }}</td>
                                <td>{{ $order_detail->card_exp_year }}</td>
                            </tr>
                            @endif

                            <tr>
                                <td class="table-primary">{{ PAYMENT_STATUS }}</td>
                                <td>{{ $order_detail->payment_status }}</td>
                            </tr>
                        </table>
                    </div>

                    <a href="{{ route('traveller.order') }}" class="btn btn-primary">{{ BACK_TO_PREVIOUS }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection