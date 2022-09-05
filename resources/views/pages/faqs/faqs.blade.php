@extends('layouts.front_master')

@section('page_title', 'Faqs')

@section('content')
    <div id="main" class="page entry-content body-bg pt-5 pb-5">
        <div class="container">
            <div class="head">
                <h2>
                    FAQS
                </h2>
            </div>
            <div class="content">
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $faq)
                        <div class="accordion-item ">
                            <h2 class="accordion-header" id="headingOne-{{ $faq->id }}">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne-{{ $faq->id }}" aria-controls="collapseOne">
                                    {{ $faq->title }}
                                </button>
                            </h2>
                            <div id="collapseOne-{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! \Illuminate\Support\Str::words($faq->description, -1, '...') !!}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
