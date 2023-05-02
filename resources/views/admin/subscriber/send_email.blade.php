@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Send Email to Subscribers</h1>

    <form action="{{ route('admin.subscriber.send_email_action') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Send Email to Subscribers</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.subscriber.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> All Subscribers</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Subject *</label>
                    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="message" class="form-control editor" cols="30" rows="10">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Send Email</button>
            </div>
        </div>
    </form>

@endsection
