@extends('main')

@section('title', '| Homepage')

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">Welcome To My Laravel Blog</h1>
            <p class="subtitle">If you like coding, games, and magic, then you are at the right place. And when I say magic, it means Magic: The Gathering</p>
        </div>
    </div>
</section>

<div class="columns is-marginless is-centered">
    <div class="column">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">

                @foreach ($posts as $post)

                    <div class="tile is-child box">
                        <p class="title has-text-grey">{{ $post->title }}</p>
                        <p class="subtitle">
                            {!! substr($post->body_html, 0, 50) !!}
                            {{ strlen($post->body) > 50 ? "..." : "" }}
                        </p>
                        <a href="{{ url('blog', $post->slug) }}" class="button">Read More</a>
                        <p class="subtitle">
                            Created at: {{ date('d M Y', strtotime($post->created_at))}}
                        </p>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>

{{ $posts->links() }}

@endsection

