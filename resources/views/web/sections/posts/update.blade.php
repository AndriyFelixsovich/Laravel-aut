@extends('layouts.main')

@section('title', 'home page')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h1>New post</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
{{--                <a href="{{ route('login') }}" class="ms-3">Already registered?</a>--}}
            </form>
        </div>
    </div>

@endsection
