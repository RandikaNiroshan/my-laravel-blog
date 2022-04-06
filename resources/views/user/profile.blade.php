@extends('layouts.app')

@section('title'){{ $user->name }} @endsection

@section('content')
    <div class="container p-3">
        <div class="card mb-3">
            <div class="d-flex w-100 justify-content-center pt-2 pb-0">
                <h4 class="card-title fw-bold">{{ $user->name }}</h4>
            </div>
        </div>
    </div>
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-sm-12">
                <h5 class="card-title mb-3">Blog Posts ({{ $user->posts->count() }})</h5>
                <div class="list-group">
                    @foreach ($user->posts as $post)
                        <div class="list-group-item list-group-item-action mb-2">
                            <div class="d-flex w-100 justify-content-between">
                                <a href="{{ route('blog.show', ['blog' => $post->id]) }}">
                                    <h5 class="text-primary fw-bold mb-1">{{ $post->title }}</h5>
                                </a>

                                <small class="text-warning">
                                    {{ $post->comments->count() }} comments
                                </small>
                            </div>
                            <p class="mb-1">{{ $post->content }}</p>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-5 col-lg-5 col-sm-12">
                <h5 class="card-title mb-3">Comments ({{ $user->comments->count() }})</h5>
                <ul class="list-group">
                    @forelse ($user->comments as $comment)
                        <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                            <div class="ms-2 me-auto">
                                {{ $comment->content }}
                                <br />
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }} </small>
                                <a href="{{ route('blog.show', ['blog' => $comment->blog_post_id]) }}">
                                    <small> View post</small>
                                </a>

                            </div>
                        </li>
                    @empty
                        <p class="text-danger"> User dont posted any comments! </p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
