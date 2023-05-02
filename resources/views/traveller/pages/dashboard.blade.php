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
                    <div class="detail-dashboard mt_30">
                           
                        <div class="row dashboard-stat">
                            <div class="col-md-6 dashboard-stat-item">
                                <div class="bg-info p_20 pt_30 pb_30 text-center text-white">
                                    <div class="text fz_25"><b>{{ COMPLETED_ORDERS }}</b></div>
                                    <div class="total fz_25">
                                        @php
                                            $total_completed_orders = DB::table('orders')->where('traveller_id', session()->get('traveller_id'))->where('payment_status', 'Completed')->count();
                                        @endphp
                                        {{ $total_completed_orders }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 dashboard-stat-item">
                                <div class="bg-info p_20 pt_30 pb_30 text-center text-white">
                                    <div class="text fz_25"><b>{{ PENDING_ORDERS }}</b></div>
                                    <div class="total fz_25">
                                        @php
                                            $total_pending_orders = DB::table('orders')->where('traveller_id', session()->get('traveller_id'))->where('payment_status', 'Pending')->count();
                                        @endphp
                                        {{ $total_pending_orders }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
