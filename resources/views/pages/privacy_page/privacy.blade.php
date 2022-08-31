@extends('layouts.front_master')

@section('page_title', 'Privacy')

@section('content')
    <div id="main" class="page entry-content body-bg pt-5 pb-5">
        <div class="container">
            <div class="head">
                <h2>Privacy </h2>
            </div>
            <div class="content">
                @foreach($privacies as $privacy)
                    <div class="head">
                        <h3>
                            {{ $privacy->title }}
                        </h3>
                    </div>
                    <div>
                        <p>
                            {!! \Illuminate\Support\Str::words($privacy->description, -1, '...') !!}
                        </p>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
