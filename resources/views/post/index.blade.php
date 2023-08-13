@extends('layout.app')

@section('title', 'Home Page')
@section('heading', 'All Posts')
@section('link_text', 'Add New Post ')
@section('link', '/post/create')

@section('content')


    @if (session('message'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button class="btn-close" type="button" data-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <div class="row g-4 mt-1">
        @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="card shadow">
                    <a href="post/{{ $post->id }}">
                        <img src="/image/{{ $post->image }}" alt="" class="card-img-top img-fluid "
                            style="height: 400px;  background-position: center;">
                    </a>
                    <div class="card-body">
                        <p class="btn btn-success  rounded-pill btn-sm">{{ $post->category }}</p>
                        <div class="card-title fw-bold text-primary h4">{{ $post->title }}</div>
                        <p class="text-secondary">{{ Str::limit($post->content, 100) }}</p>
                        <a href="post/{{ $post->id }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center my-5">
            {{ $posts->links() }}
        </div>
    </div>
    </div>

    {{-- @empty
    <h2 class="text-center text-secondary my-5">No Post found in the database!</h2>
@endempty --}}
@endsection
