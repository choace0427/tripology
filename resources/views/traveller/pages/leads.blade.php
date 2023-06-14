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

                    <h1>View All Leads</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered order-table" width="100%" cellspacing="0">
                            <tr class="table-primary">
                                <th>SL</th>
                                <th>Package Name</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th>Start End</th>
                                <th>Action</th>
                            </tr>

                            @foreach($leads as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->package->p_name }}</td>
                                <td>{{$row->traveller->traveller_name}}</td>
                                <td>{{ $row->traveller->traveller_phone }}</td>
                                <td>{{ $row->traveller->traveller_email }}</td>
                                <td>{{ $row->start_date }}</td>
                                <td>{{ $row->end_date }}</td>
                                <!-- <td>{{ $row->published }}</td> -->
                                <td>
                                    <div class="Expand"><a class="show_chat_form">Expand All</a></div>
                                </td>
                            </tr>
                            <tr>
                            <td colspan="7">
                            <div class="showChatWithForm"> 
                            <div class="row Expand2 mt-3 " style="overflow-y:  scroll; height: 350px;">


                                    <div class="col-md-12">

                                    @foreach($row->chat as $chat)

                                    @if($chat->receiver_id == session('traveller_id'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <h4>From Agency</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <p>{{$chat->message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row  text-end">
                                            <div class="col-md-12">
                                                <div>
                                                    <h4>Your Message</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row Expand3">
                                            <div class="col-md-12">
                                                <div>
                                                    <p>{{$chat->message}}</p>                        
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach


                                    </div>
                                    </div>

                                    <form action="{{ route('traveller.chat.store') }}" method="post">
                                        @csrf
                                        <div class="row Response-input mt-5">
                                            <div class="col-md-12">
                                                <div>
                                                    <h5>Response</h5>
                                                    <input type="text" name="message" placeholder="Write Response here">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row Response-input mt-3">
                                            <div class="col-md-12 text-end">
                                                <div class="Expand ">
                                                    <input type="hidden" name="receiver_id" value="{{$row->agency_id}}"/>
                                                    <input type="hidden" name="lead_id" value="{{$row->id}}"/>
                                                    <button type="submit">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </table>
                    </div>

                    {{ $leads->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
$(function() {
    $("td[colspan=7]").find(".showChatWithForm").hide();
    $(".show_chat_form").on('click',function(event) {
        event.stopPropagation();
        var $target = $(event.target);
        if ( $target.closest("td").attr("colspan") > 1 ) {
            $target.slideUp();
        } else {
            $target.closest("tr").next().find(".showChatWithForm").slideToggle();
        }                    
    });
});
</script>