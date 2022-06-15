@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2>Edit Questions</h2>
                        </div>
                        <div class="col-8">
                            <a href="" class="btn btn-outline-secondary" style="float: right;">Back to all
                                Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.update', $question->id) }}" method="post">
                        {{ method_field('PUT') }}
                        @include("questions._form", ['buttonText' => 'Update Question'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection