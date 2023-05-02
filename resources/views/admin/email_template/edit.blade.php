@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Email Template</h1>

    <form action="{{ url('admin/email-template/update/'.$email_template->id) }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Email Template</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.email_template.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Subject *</label>
                            <input type="text" name="et_subject" class="form-control" value="{{ $email_template->et_subject }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Contact Page Message *</label>
                            <textarea name="et_content" class="form-control editor" cols="30" rows="10">{{ $email_template->et_content }}</textarea>

                            <div class="font-weight-bold mt_20 text-danger">Parameters You Can Use: </div>
                            
                            @if($id == 1)
                            <div>[[visitor_name]] = Visitor Name</div>
                            <div>[[visitor_email]] = Visitor Email</div>
                            <div>[[visitor_phone]] = Visitor Phone</div>
                            <div>[[visitor_message]] = Visitor Message</div>

                            @elseif($id == 3)
                            <div>[[verification_link]] = Subscriber Verification Link</div>
 
                            @elseif($id == 4)
                            <div>[[post_link]] = News View Link</div>
  
                            @elseif($id == 5)
                            <div>[[reset_link]] = Reset Password Page Link</div>
  
                            @elseif($id == 6)
                            <div>[[verification_link]] = Traveller Registration Verification Link</div>
 
                            @elseif($id == 7)
                            <div>[[reset_link]] = Reset Password Page Link</div>
 
                            @elseif($id == 8)
                            <div>[[traveller_name]] = Traveller Name</div>
                            <div>[[order_number]] = Order Number</div>
                            <div>[[payment_method]] = Payment Method Details with Card Information</div>
                            <div>[[payment_date_time]] = Payment Date and Time</div>
                            <div>[[transaction_id]] = Transaction Id</div>
                            <div>[[paid_amount]] = Total Paid Amount</div>
                            <div>[[payment_status]] = Payment Status (Paid or Completed)</div>                           
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
