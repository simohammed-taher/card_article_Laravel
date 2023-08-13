@extends('layout.app')

@section('title', 'Post Details')
@section('heading', 'Post Details')
@section('link_text', 'Go-To All Posts')
@section('link', '/post')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow">
                    <img src="/image/{{ $post->image }}" alt="" class="card-img-top img-fluid">
                </div>
                <div class="card-body py-4 px-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="btn btn-dark rounded-pill">{{ $post->category }}</p>
                        <p class="lead">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                    </div>
                    <hr>
                    <h3 class="font-weight-bold text-primary">{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                    <div class="card-footer px-5 py-3 d-flex justify-content-end">
                        <a href="/post/{{ $post->id }}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
                        <form action="{{ url('/post/' . $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill me-2" title="Delete Student"
                                onclick="return confirm('Confirm delete?')">supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
