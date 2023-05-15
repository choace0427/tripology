@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Top Notification</h1>

    <form action="{{ route('admin.notification.store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">
                    @if($notification)
                        Update Top Notification Content
                    @else 
                        Add Top Notification Content
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Notification Message</label>
                    <textarea type="text" name="notification_message" class="form-control editor" cols="30" rows="10">@if($notification && $notification->notification_message) {{ $notification->notification_message }} @else {{ old('notification_message') }}@endif</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
