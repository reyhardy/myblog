@extends('main')

@section('title', ' | View Post')

@section('content')

    <div class="columns">
        <div class="column">
                <div class="tile is-parent">
                        <div class="tile is-child box">
                            <h1 class="title is-1 is-spaced"> {{ $post->title }} </h1>
                            {{-- <p class="subtitle"> --}}
                            <div class="field is-grouped is-grouped-multiline">
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag">URL: </span><span class="tag is-primary"><a href="{{ url('blog', $post->slug) }}">{{ substr(url('blog', $post->slug), 0,20) }}{{ strlen(url('blog', $post->slug)) > 20 ? "..." : "" }}</a></span>
                                    </div>
                                </div>
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
                            {{-- <p> {{ $post->body }} </p> --}}
                            <p> {!! $post->body_html !!} </p>
                            <hr>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{route('posts.edit', $post->id)}}" class="button is-primary">Edit</a>
                                </p>
                                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                    @method('DELETE')
                                    <div class="control">
                                        <input type="submit" value="Delete" class="button is-danger">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </div>
                                </form>
                            </div>
                            <a href="{{route('posts.index')}}" class="button"><< Show All Post</a>
                        </div>
                </div>
        </div>

    </div>

@endsection
