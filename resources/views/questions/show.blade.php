@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h1>{{ $question->title }}</h1>
                        </div>
                        <div class="col">

                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary"
                                style="float: right;">Back to all
                                Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {!! $question->body_html !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection