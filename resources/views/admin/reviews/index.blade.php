@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Reviews</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Reviews</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Package Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Reviewer Name</th>
                        <th>Reviewer Email</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->package->p_name }}</td>
                            <td>
                                <!-- {{ $row->rating }} -->
                                @for($i = 0; $i < 5; $i++)
                                    @if($i < $row->rating)
                                        <span class="stars-active">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    @else 
                                    <span class="stars-inactive">
                                            <i class="fas fa-star"></i>
                                        </span>   
                                    @endif
                                @endfor
                            </td>
                            <td>{{ $row->review }}</td>
                            <td>{{ $row->reviewer_name }}</td>
                            <td>{{ $row->reviewer_email }}</td>
                            <!-- <td>{{ $row->published }}</td> -->
                            <td>

                            @if($row->published == 1)
                                <a href="{{ URL::to('admin/review/status/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure? You want to Unpublish Review');">Unpublish</a>
                            @else
                                <a href="{{ URL::to('admin/review/status/'.$row->id) }}" class="btn btn-success btn-sm btn-block" onClick="return confirm('Are you sure? You want to Publish Review');">Publish</a>
                            @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('admin/review/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<style>
.stars-active{color:#EEBD01}
</style>