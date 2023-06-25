@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Leads</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Leads</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTabless" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Package Name</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Start Date</th>
                        <th>Start End</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $lead->package->p_name }}</td>
                            <td>{{ $lead->traveller->traveller_name}}</td>
                            <td>{{ $lead->traveller->traveller_phone }}</td>
                            <td>{{ $lead->traveller->traveller_email }}</td>
                            <td>{{ $lead->start_date }}</td>
                            <td>{{ $lead->end_date }}</td>
                        </tr>
                    </tbody>
                </table>
                @if(count($lead->chat) > 0)
                <div class="row Expand2 mt-3"  style="overflow-y:  scroll; height: 350px;">


                <div class="col-md-12">
                
                @foreach($lead->chat as $chat)
                
                @if($chat->receiver_id == session('id'))
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <h4>From Customer</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                @if($chat->message)
                                    {{$chat->message}} <br/><br/>
                                @endif
                                 
                                @if($chat->media)
                                    @foreach(explode(',',$chat->media) as $media)
                                        @if(pathinfo($media, PATHINFO_EXTENSION) == "pdf")
                                            <a href="{{ asset('/chat/'.$media)}}" target="_blank">{{$media}}</a>
                                        @else
                                            <a href="{{ asset('/chat/'.$media)}}" target="_blank"><img src="{{ asset('/chat/'.$media)}}" style="width:200px;" /></a>
                                        @endif
                                    @endforeach
                                @endif  
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
                                <p>
                                    @if($chat->message)
                                        {{$chat->message}} <br/><br/>
                                    @endif
                                 
                                    @if($chat->media)
                                        @foreach(explode(',',$chat->media) as $media)
                                            @if(pathinfo($media, PATHINFO_EXTENSION) == "pdf")
                                                <a href="{{ asset('/chat/'.$media)}}" target="_blank">{{$media}}</a>
                                            @else
                                                <a href="{{ asset('/chat/'.$media)}}" target="_blank"><img src="{{ asset('/chat/'.$media)}}" style="width:200px; height:200px;" /></a>
                                            @endif
                                        @endforeach
                                    @endif  
                                </p>
                                                  
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach


            </div>
        </div>
        @endif

        <form action="{{ route('agency.chat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row Response-input mt-5">
                <div class="col-md-12">
                    <div>
                        <h5>Response</h5>
                        <!-- ?<input type="text" name="message" placeholder="Write Response here"> -->
                        <textarea name="message"  placeholder="Write Response here" class="form-control"></textarea>
                    </div>

                    <div>
                        <h5>Media</h5>
                        <input type="file" name="media[]" placeholder="Select media" multiple>
                    </div>

                </div>
            </div>

            <div class="row Response-input mt-3">
                <div class="col-md-12 text-end">
                    <div>
                        <input type="hidden" name="receiver_id" value="{{$lead->traveller_id}}"/>
                        <input type="hidden" name="lead_id" value="{{$lead->id}}"/>
                        <button type="submit">Send</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
            </div>
        </div>
    </div>
@endsection
<style>
.chat-first-bg{
    background: #CDDEFF;
    padding: 10px 0px;
    margin: 0px 10px;
    border: solid 1px #000;
    border-radius: 5px;
    box-shadow: 0px 0px 3px;
}
.text-end {
    text-align: right!important;
}
.Expand button{
    background: #01008C;
    padding: 8px 30px;
    margin-right: 10px;
    color: #fff;
    border: none;
    border-radius: 5px;
}

.Expand2{
    background: #CDDEFF;
    border: solid 1px #000;
    margin: 0px 10px;
    border-radius: 5px;
    padding: 10px 20px;
}

.Expand2 h4{
    font-size: 25px;
    font-weight: 600;
    margin-bottom: 0px;
}

.Expand2 p{
    background: #99BCFF;
    padding: 3px 8px;
    border-radius: 5px;
    width: 85%;
    margin-bottom: 0px;
}

.Expand2 h6{
    padding-right: 213px;
    font-weight: 600;
    font-size: 13px;
}

.Expand3 p{
    margin-left: 214px;
}

.Expand3 h6{
    padding-right: 0px;
}

.Response-input{
    margin: 0px 5px;
}

.Response-input input{
    width: 100%;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 0px 4px;
    border-radius: 5px;
}

.Response-input button{
    background: #01008C;
    padding: 7px 40px;
    color: #fff;
    border-radius: 6px;
}
</style>