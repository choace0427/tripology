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

                    <h1>{{ VIEW_ALL_PAYMENT }}</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered order-table" width="100%" cellspacing="0">
                            <tr class="table-primary">
                                <td>{{ SERIAL }}</td>
                                <td>{{ ORDER_NO }}</td>
                                <td>{{ PRICE }}</td>
                                <td>{{ CURRENCY }}</td>
                                <td>{{ PACKAGE }}</td>
                                <td>{{ DESTINATION }}</td>
                                <td>{{ PAYMENT_STATUS }}</td>
                                <td>{{ ACTION }}</td>
                            </tr>

                            @php
                                $order_data = DB::table('orders')->orderBy('id','desc')->where('traveller_id', session()->get('traveller_id'))->paginate(10);
                            @endphp

                            @foreach($order_data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->order_no }}</td>

                                <td><i class="{{ $row->original_currency_sign }}"></i> {{ number_format($row->original_price,2) }}</td>
                                <td>{{ $row->original_currency_name }}</td>

                                <td>
                                    @php
                                        $package_data = DB::table('packages')->where('id', $row->package_id)->first();
                                    @endphp
                                    {{ $package_data->p_name }}
                                    <div>
                                        <a href="{{ URL::to('package/'.$package_data->p_slug) }}" class="btn btn-primary btn-xs mt_10">{{ SEE_DETAIL }}</a>
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $destination_data = DB::table('destinations')->where('id', $package_data->destination_id)->first();
                                    @endphp
                                    {{ $destination_data->d_name }}
                                    <div>
                                        <a href="{{ URL::to('destination/'.$destination_data->d_slug) }}" class="btn btn-primary btn-xs mt_10">{{ SEE_DETAIL }}</a>
                                    </div>
                                </td>
                                <td>
                                    @if($row->payment_status == 'Completed')
                                        <a href="javascript:void;" class="btn btn-success btn-xs">{{ $row->payment_status }}</a>
                                    @else
                                        <a href="javascript:void;" class="btn btn-danger btn-xs">{{ $row->payment_status }}</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::to('traveller/detail/'.$row->id) }}" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>

                    {{ $order_data->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection