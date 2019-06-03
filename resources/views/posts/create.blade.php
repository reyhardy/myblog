@extends('main')

@section('title', '| Create Post')

@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Create Posts
                </h1>
            </div>
        </div>
    </section>

<div class="columns is-marginless is-centered">
    <div class="column is-8">
    <form action="{{ route('posts.store') }}" method="POST">

        {{ csrf_field() }}
        <div class="field">
            <label name="title" class="label">Title:</label>
            <div class="control">
                <input name="title" class="input is-rounded" type="text" placeholder="Title">
            </div>
        </div>

        {{-- <div class="field">
            <label name="slug" class="label">Slug  URL:</label>
            <div class="control">
                <input name="slug" class="input is-rounded" type="text" placeholder="URL">
            </div>
        </div> --}}

        <div class="field">
            <label name="body" class="label">Post Body:</label>
            <div class="control">
                <textarea name="body" class="textarea" placeholder=""></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <input type="submit" value="Create Post" class="button is-primary is-fullwidth">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
            <div class="control">
                <a href="{{route('posts.index')}}" class="button is-danger">Cancel</a>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
