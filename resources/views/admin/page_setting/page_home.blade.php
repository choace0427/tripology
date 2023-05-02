@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Home Page Information</h1>

    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link active" id="v-pills-meta-tab" data-toggle="pill" href="#v-pills-meta" role="tab" aria-controls="v-pills-meta" aria-selected="true">Meta Information</a>

                        <a class="nav-link" id="v-pills-service-tab" data-toggle="pill" href="#v-pills-service" role="tab" aria-controls="v-pills-service" aria-selected="false">Service Section</a>

                        <a class="nav-link" id="v-pills-package-tab" data-toggle="pill" href="#v-pills-package" role="tab" aria-controls="v-pills-package" aria-selected="false">Featured Package Section</a>

                        <a class="nav-link" id="v-pills-counter-tab" data-toggle="pill" href="#v-pills-counter" role="tab" aria-controls="v-pills-counter" aria-selected="false">Counter Section</a>

                        <a class="nav-link" id="v-pills-destination-tab" data-toggle="pill" href="#v-pills-destination" role="tab" aria-controls="v-pills-destination" aria-selected="false">Destination Section</a>

                        <a class="nav-link" id="v-pills-testimonial-tab" data-toggle="pill" href="#v-pills-testimonial" role="tab" aria-controls="v-pills-testimonial" aria-selected="false">Testimonial Section</a>

                        <a class="nav-link" id="v-pills-team-tab" data-toggle="pill" href="#v-pills-team" role="tab" aria-controls="v-pills-team" aria-selected="false">Team Member Section</a>

                        <a class="nav-link" id="v-pills-blog-tab" data-toggle="pill" href="#v-pills-blog" role="tab" aria-controls="v-pills-blog" aria-selected="false">Latest Blog Section</a>

                        <a class="nav-link" id="v-pills-client-tab" data-toggle="pill" href="#v-pills-client" role="tab" aria-controls="v-pills-client" aria-selected="false">Client Section</a>

                        <a class="nav-link" id="v-pills-newsletter-tab" data-toggle="pill" href="#v-pills-newsletter" role="tab" aria-controls="v-pills-newsletter" aria-selected="false">Newsletter Section</a>

                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">


                        <div class="tab-pane fade show active" id="v-pills-meta" role="tabpanel" aria-labelledby="v-pills-meta-tab">

                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/meta') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_home->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_home->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->

                        </div>


                        <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/service') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="service_title" class="form-control" value="{{ $page_home->service_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="service_subtitle" class="form-control" value="{{ $page_home->service_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="service_status" id="rr1" value="Show" @if($page_home->service_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="service_status" id="rr2" value="Hide" @if($page_home->service_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>


                        <div class="tab-pane fade" id="v-pills-package" role="tabpanel" aria-labelledby="v-pills-package-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/package') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="featured_package_title" class="form-control" value="{{ $page_home->featured_package_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="featured_package_subtitle" class="form-control" value="{{ $page_home->featured_package_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="featured_package_status" id="rr1" value="Show" @if($page_home->featured_package_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="featured_package_status" id="rr2" value="Hide" @if($page_home->featured_package_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>




                        <div class="tab-pane fade" id="v-pills-counter" role="tabpanel" aria-labelledby="v-pills-counter-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/counter') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="current_photo" value="{{ $page_home->counter_bg }}">
                                <div class="form-group">
                                    <label for="">Counter 1 - Number</label>
                                    <input type="text" name="counter1_number" class="form-control" value="{{ $page_home->counter1_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 1 - Text</label>
                                    <input type="text" name="counter1_text" class="form-control" value="{{ $page_home->counter1_text }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 2 - Number</label>
                                    <input type="text" name="counter2_number" class="form-control" value="{{ $page_home->counter2_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 2 - Text</label>
                                    <input type="text" name="counter2_text" class="form-control" value="{{ $page_home->counter2_text }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 3 - Number</label>
                                    <input type="text" name="counter3_number" class="form-control" value="{{ $page_home->counter3_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 3 - Text</label>
                                    <input type="text" name="counter3_text" class="form-control" value="{{ $page_home->counter3_text }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 4 - Number</label>
                                    <input type="text" name="counter4_number" class="form-control" value="{{ $page_home->counter4_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Counter 4 - Text</label>
                                    <input type="text" name="counter4_text" class="form-control" value="{{ $page_home->counter4_text }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->counter_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="counter_bg"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="counter_status" id="rr1" value="Show" @if($page_home->counter_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="counter_status" id="rr2" value="Hide" @if($page_home->counter_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>





                        <div class="tab-pane fade" id="v-pills-destination" role="tabpanel" aria-labelledby="v-pills-destination-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/destination') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="destination_title" class="form-control" value="{{ $page_home->destination_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="destination_subtitle" class="form-control" value="{{ $page_home->destination_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="destination_status" id="rr1" value="Show" @if($page_home->destination_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="destination_status" id="rr2" value="Hide" @if($page_home->destination_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>


                        <div class="tab-pane fade" id="v-pills-testimonial" role="tabpanel" aria-labelledby="v-pills-testimonial-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/testimonial') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="current_photo" value="{{ $page_home->testimonial_bg }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="testimonial_title" class="form-control" value="{{ $page_home->testimonial_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="testimonial_subtitle" class="form-control" value="{{ $page_home->testimonial_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->testimonial_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="testimonial_bg"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="testimonial_status" id="rr1" value="Show" @if($page_home->testimonial_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="testimonial_status" id="rr2" value="Hide" @if($page_home->testimonial_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>





                        <div class="tab-pane fade" id="v-pills-team" role="tabpanel" aria-labelledby="v-pills-team-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/team') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="team_member_title" class="form-control" value="{{ $page_home->team_member_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="team_member_subtitle" class="form-control" value="{{ $page_home->team_member_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="team_member_status" id="rr1" value="Show" @if($page_home->team_member_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="team_member_status" id="rr2" value="Hide" @if($page_home->team_member_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>




                        <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-blog-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/blog') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="latest_blog_title" class="form-control" value="{{ $page_home->latest_blog_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="latest_blog_subtitle" class="form-control" value="{{ $page_home->latest_blog_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="latest_blog_status" id="rr1" value="Show" @if($page_home->latest_blog_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="latest_blog_status" id="rr2" value="Hide" @if($page_home->latest_blog_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>




                        <div class="tab-pane fade" id="v-pills-client" role="tabpanel" aria-labelledby="v-pills-client-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/client') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="client_title" class="form-control" value="{{ $page_home->client_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="client_subtitle" class="form-control" value="{{ $page_home->client_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="client_status" id="rr1" value="Show" @if($page_home->client_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="client_status" id="rr2" value="Hide" @if($page_home->client_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>





                        <div class="tab-pane fade" id="v-pills-newsletter" role="tabpanel" aria-labelledby="v-pills-newsletter-tab">
                            <!-- Tab Start -->
                            <form action="{{ url('admin/page_home_update/newsletter') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="current_photo" value="{{ $page_home->newsletter_bg }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="newsletter_title" class="form-control" value="{{ $page_home->newsletter_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <textarea name="newsletter_text" class="form-control h_100" cols="30" rows="10">{{ $page_home->newsletter_text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->newsletter_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="newsletter_bg"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="newsletter_status" id="rr1" value="Show" @if($page_home->newsletter_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="newsletter_status" id="rr2" value="Hide" @if($page_home->newsletter_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab End -->
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
