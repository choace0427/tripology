@extends('admin.admin_layouts')
@section('admin_content')

    @php
        $package_row = DB::table('packages')->where('id', $package_id)->first();
    @endphp

    <h1 class="h3 mb-3 text-gray-800">Videos of {{ $package_row->p_name }}</h1>
    <form action="{{ route('agency.package.video-store') }}" method="post">
        @csrf

        <input type="hidden" name="package_id" value="{{ $package_id }}">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Package Video</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('agency.package.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Back to Package Page</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Video Youtube Id *</label>
                    <input type="text" name="video_youtube_id" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">All Existing Videos</h6>
            <div class="float-right d-inline">
                <a href="{{ route('agency.package.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Back to Package Page</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($package_video as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $row->video_youtube_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </td>
                            <td>
                                <a href="{{ URL::to('agency/package/video-delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
