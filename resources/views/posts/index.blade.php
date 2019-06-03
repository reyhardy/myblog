@extends('main')

@section('title', ' | All Posts')

@section('content')
    <div class="columns is-multiline is-desktop">
        <div class="column is-four-fifths">
            <div class="content">
                <h1>All Post</h1>
            </div>
        </div>
        <div class="column">
                <a href="{{route('posts.create')}}" class="button is-info is-flex">Create New Post</a>
        </div>
        {{-- <div class="columns is-full"> --}}
            <div class="column is-full">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th class="is-hidden-mobile">Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)

                            <tr>
                                <th>{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                {{-- <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td> --}}
                                {{-- <td>{!! $post->body_html !!}{{ strlen($post->body) > 50 ? "..." : "" }}</td> --}}
                                <td>{!! substr($post->body_html, 0, 50) !!}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                                <td class="is-hidden-mobile">{{ date('d-M-Y', strtotime($post->created_at))}}</td>
                                <td>
                                    <a href="{{ route("posts.show", $post->id)}}" class="button is-small">View</a>
                                    <a href="{{ route("posts.edit", $post->id)}}" class="button is-small">Edit</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
                {{-- <div class="has-text-centered"> --}}
                {{ $posts->links() }}
                {{-- </div> --}}
            </div>
        {{-- </div> --}}

    </div>


@endsection
