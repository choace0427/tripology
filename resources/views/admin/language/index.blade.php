@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Language Setting</h1>
    <form action="{{ route('admin.language.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary">Setup your key values</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($json_data as $key=>$value)
                                    <tr>
                                        <td>
                                            <textarea name="" class="form-control h_55" cols="30" rows="10" disabled>{{ $key }}</textarea>
                                        </td>
                                        <td>
                                            <input type="hidden" class="form-control" name="key_arr[]" value="{{ $key }}">
                                            <textarea name="value_arr[]" class="form-control h_55" cols="30" rows="10">{{ $value }}</textarea>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        
@endsection