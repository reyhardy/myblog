@extends('main')

@section('title', "| $post->title")

@section('content')

    <div class="content">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body_html !!}</p>
    </div>

    <a href="/" class="button"><< Back to Home</a>

@endsection
