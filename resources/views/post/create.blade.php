@extends('layout.app');
@section('title', 'Add New Post')
@section('heading', 'Create a New Post')
@section('link_text', 'Go-to All Posts ')
@section('link', '/post')
@section('content')
    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h3 class="text-light fw-bold">Add New Post</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-2">
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="text" name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror" placeholder="category"
                                value="{{ old('category') }}">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror"" placeholder="image"
                                value="{{ old('image') }}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror""
                                placeholder="form-content">
                                {{ old('content') }}
                            </textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="submit" value="Add Post" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
