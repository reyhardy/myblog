@extends('main')

@section('title', ' | Edit Post')

@section('content')

<div class="tile is-parent">
    <div class="tile is-child box">
            <form action="{{route('posts.update', $post->id)}}" method="post">
            @method('PUT')
            <div class="field">
                <label name="title" class="label">Title:</label>
                <div class="control">
                    <input name="title" value="{{ old('title', $post->title) }}" class="input is-rounded" type="text" placeholder="Title">
                </div>
            </div>
            {{-- <div class="field">
                <label name="slug" class="label">URL Slug:</label>
                <div class="control">
                    <input name="slug" value="{{ old('slug', $post->slug) }}" class="input is-rounded" type="text" placeholder="URL">
                </div>
            </div> --}}
        {{-- <p class="subtitle"> --}}
        <div class="field is-grouped is-grouped-multiline">
            <div class="control">
                <div class="tags has-addons">
                    <span class="tag">Created at: </span><span class="tag is-primary">{{ date('d-M-Y @ H:i:s', strtotime($post->created_at))}}</span>
                </div>
            </div>
            <div class="control">
                <div class="tags has-addons">
                    <span class="tag">Last updated at: </span><span class="tag is-primary">{{ date('d-M-Y @ H:i:s', strtotime($post->updated_at))}}</span>
                </div>
            </div>
        </div>
        {{-- </p> --}}
        <hr>
        <div class="field">
            <div class="control">
                <label class="label">Post Body:</label>
                <textarea name="body" class="textarea" placeholder="">{{ old('body', $post->body) }}</textarea>
            </div>
        </div>
        <hr>

        {{-- <div class="field is-grouped">
            <p class="control">
                <a href="{{route('posts.show', $post->id)}}" class="button is-danger">Cancel</a>
            </p>
            <p class="control">
                <a href="{{route('posts.update', $post->id)}}" class="button is-success">Save Changes</a>
            </p>
        </div> --}}

        <div class="field is-grouped">
            <div class="control">
                <a href="{{route('posts.show', $post->id)}}" class="button is-danger">Cancel</a>
            </div>
            <div class="control">
                <input type="submit" value="Save Changes" class="button is-success">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
