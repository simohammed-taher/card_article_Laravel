@extends('layout.app');
@section('title', 'Edit Post')
@section('heading', 'Edit this Post')
@section('link_text', 'Go-to All Posts ')
@section('link', '/post')
@section('content')
    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h3 class="text-light fw-bold">Edit Post</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('post/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="my-2">
                            <input type="text" name="title" id="title" value="{{ $post->title }}"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="text" value="{{ $post->category }}" name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror" placeholder="Category">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" placeholder="Image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <img src="/image/{{ $post->image }}" width="100px" class="bon-image">
                        </div>
                        <div class="my-2">
                            <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror"
                                placeholder="form-content">{{ old('content') ?? $post->content }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="submit" value="Update Post" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
