@extends('layouts.app')

@section('content')

    <div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_faq) }})">
        <div class="bg"></div>
        <div class="bannder-table">
            <div class="banner-text">
                <h1>{{ $faq->name }}</h1>
            </div>
        </div>
    </div>


    <div class="faq-page pt_40 pb_80">
        <div class="container wow fadeIn">

            <div class="row">
                <div class="col-md-12">
                    {!! clean($faq->detail) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="accordion" id="accordionExample">

                        @php $i=0; @endphp
                        @foreach ($faqs as $row)
                            @php $i++; @endphp

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $i }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                                        {{ $row->faq_title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {!! clean($row->faq_content) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
