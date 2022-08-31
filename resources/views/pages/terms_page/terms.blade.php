@extends('layouts.front_master')

@section('page_title', 'Terms')

@section('content')
    <div id="main" class="page entry-content body-bg pt-5 pb-5">
        <div class="container">
            <div class="head">
                <h2>Terms & Conditions</h2>
            </div>
            <div class="content">
                @foreach($terms as $term)
                    <div class="head">
                        <h3>
                            {{ $term->title }}
                        </h3>
                    </div>
                    <div>
                        <p>
                            {!! \Illuminate\Support\Str::words($term->description, -1, '...') !!}
                        </p>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
