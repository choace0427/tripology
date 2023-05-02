@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Other Page Information</h1>
    
    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Page</a>
                        <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Login Page</a>
                        <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Registration Page</a>
                        <a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Forget Password Page</a>
                        <a class="nav-link" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">Traveller Panel</a>
                        <a class="nav-link" id="v-pills-8-tab" data-toggle="pill" href="#v-pills-8" role="tab" aria-controls="v-pills-8" aria-selected="false">Payment Page</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">

                            <!-- Tab 1 -->
                            <form action="{{ url('admin/page/other/1') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_other1->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other1->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 1 -->

                        </div>
                        
                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                            <!-- Tab 4 -->
                            <form action="{{ url('admin/page/other/4') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_other4->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other4->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 4 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                            <!-- Tab 5 -->
                            <form action="{{ url('admin/page/other/5') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_other5->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other5->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 5 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                            <!-- Tab 6 -->
                            <form action="{{ url('admin/page/other/6') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_other6->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other6->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 6 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
                            <!-- Tab 7 -->
                            <form action="{{ url('admin/page/other/7') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_other7->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other7->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 7 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">
                            <!-- Tab 8 -->
                            <form action="{{ url('admin/page/other/8') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_other8->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_other8->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 8 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection