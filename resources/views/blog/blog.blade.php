@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    @isset($posts)
        <div class="container p-3">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12">
                    <div class="list-group">
                        @foreach ($posts as $post)
                            <div
                                class="list-group-item list-group-item-action mb-2 
                            @auth
                                {{ $post->user->id == Auth::user()->id ? 'list-group-item-info' : '' }}
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
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }} by</small>
                                <a href="{{ route('user.show', ['user' => $post->user->id]) }}">
                                    <small> {{ $post->user->name }}</small>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    @isset($mostCommented)
                        <div class="card mb-3 p-2">
                            <h5 class="card-title mb-3">Most commented posts</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($mostCommented as $post)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <a href="{{ route('blog.show', ['blog' => $post->id]) }}">
                                                <h6 class="text-primary fw-bold mb-1">{{ $post->title }}</h6>
                                            </a>
                                            <small class="text-muted">{{ $post-> created_at->diffForHumans() }}</small>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ $post->comments_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset

                    @isset($mostActive)
                        <div class="card mb-3 p-2">
                            <h5 class="card-title mb-3">Most active users</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($mostActive as $user)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <a href="{{ route('user.show', ['user' => $user->id]) }}">
                                                <h6 class="text-primary fw-bold mb-1">{{ $user->name }}</h6>
                                            </a>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ $user->posts_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
                </div>
            </div>



        </div>
    @endisset
@endsection
