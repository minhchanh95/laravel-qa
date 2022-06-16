@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2>All Questions</h2>
                        </div>

                        <div class="col">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary"
                                style="float:right">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')

                    @foreach($questions as $question)
                    <div class="media row">
                        <div class="col-2 counters">
                            <div class="vote">
                                <strong>{{ $question->votes}}</strong>
                                {{ str_plural('vote', $question->votes )}}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers}}</strong>
                                {{ str_plural('answer', $question->votes )}}
                            </div>
                            <div class="view">
                                {{ $question->views . " " . str_plural('view', $question->views )}}
                            </div>
                        </div>
                        <div class="col-6" style="margin-left: 20px;">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0">
                                    <a href="{{ $question->url }}">
                                        {{ $question->title }}
                                    </a>

                                </h3>
                            </div>
                            <p class="lead">
                                Asked by
                                <a href="{{ $question->user->url }}">
                                    {{ $question->user->name }}
                                </a>
                                <small class="text-muted">
                                    {{ $question->created_date }}
                                </small>
                            </p>
                            {{ str_limit($question->body, 250)}}
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">

                                    @can('update-question', $question)

                                    <a href="{{ route('questions.edit', $question->id) }}"
                                        class="btn btn-sm btn-outline-info" style="float:right">Edit</a>

                                    @endcan

                                </div>
                                <div class="col">
                                    @can('delete-question', $question)
                                    <form class="form-delete" method="post"
                                        action="{{ route('questions.destroy', $question->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    {{ $questions->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection