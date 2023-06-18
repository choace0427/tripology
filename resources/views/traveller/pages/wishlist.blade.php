@extends('layouts.app')

@section('content')

<div class="dashboard-area bg-area pt_50 pb_80">
    <div class="container-fluid wow fadeIn">
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

                    <h1>Your Wishlist</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered order-table" width="100%" cellspacing="0">
                            <tr class="table-primary">
                                <th>SL</th>
                                <th>Package Name</th>
                                <th>Package Price</th>
                                <th>Start Date</th>
                                <th>Start End</th>
                                <th>Action</th>
                            </tr>
                            @foreach($wishlists as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->package->p_name }}</td>
                                <td>$ {{ $row->package->p_price }}</td>
                                <td>{{ $row->package->p_start_date }}</td>
                                <td>{{ $row->package->p_end_date }}</td>
                                <td>
                                    <form action="{{url('wishlists',$row->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                         <button type="submit" class="btn btn-primary">Remove</button>   
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </table>
                    </div>

                    {{ $wishlists->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection