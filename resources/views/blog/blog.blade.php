@extends('layouts.app')

@section('content')
    @isset($posts)
        <div class="container p-3">
            <div class="list-group">
                @foreach ($posts as $post)
                    <div class="list-group-item list-group-item-action mb-2 
                    @auth
                        {{ ($post->user->id == Auth::user()->id) ? 'list-group-item-info' : '' }}
                    @endauth ">
                        <div class="d-flex w-100 justify-content-between">
                            <a href="{{ route('blog.show', ['blog' => $post->id]) }}">
                                <h5 class="text-primary fw-bold mb-1">{{ $post->title }}</h5>
                            </a>

                            <small class="text-warning">
                                {{ $post->comments_count }} comments
                            </small>
                        </div>
                        <p class="mb-1">{{ $post->content }}</p>
                        <small>{{ $post->created_at->diffForHumans() }} by</small>
                        <a href="{{ route('user.show', ['user' => $post->user->id]) }}">
                            <small> {{ $post->user->name }}</small>
                        </a>
                    </div>
                @endforeach
            </div>

            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    @endisset
@endsection
