@extends('layouts.app')

@section('content')
    @isset($post)
        <div class="container p-3">
            <div class="card mb-3">
                <img style="width: auto; height: 220px;"
                    src="data:image/jpeg;base64,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"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text">
                        <small class="text-muted">posted {{ $post->created_at->diffForHumans() }} by</small>
                        <a href="{{ route('user.show', ['user' => $post->user->id]) }}">
                            <small>{{ $post->user->name }}</small>
                        </a>
                    </p>
                </div>
                @auth
                    @if ($post->user->id == Auth::user()->id)
                        <div class="row mb-3 ps-3">
                            <div>
                                <form method="POST" class="fm-inline"
                                    action="{{ route('blog.destroy', ['blog' => $post->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('blog.edit', ['blog' => $post->id]) }}" class="btn btn-primary me-1">
                                        Edit
                                    </a>
                                    <input type="submit" value="Delete" class="btn btn-danger" />
                                </form>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    @endisset
    <div class="container pt-3 pb-3">
        <h5 class="card-title mb-3">Comments ({{ $post->comments->count() }})</h5>
        <div class="card-body">
            @auth
                <form method="POST" action="{{ route('blog.comments.store', ['blog' => $post->id]) }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="content" class="col-form-label text-md-start">Type your comment here</label>

                        <div>
                            <textarea id="content" rows="3" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                                required>{{ old('content') }}</textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Post Comment
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <a href="{{ route('login') }}">Sign in</a> post comments
            @endauth
        </div>

        <ul class="list-group">
            @forelse ($post->comments as $comment)
                <li
                    class="list-group-item d-flex justify-content-between align-items-start mb-2 
                    @auth
                        {{ $comment->user->id == Auth::user()->id ? 'list-group-item-info' : '' }}
                    @endauth ">
                    <div class="ms-2 me-auto">
                        {{ $comment->content }}
                        <br />
                        <small>{{ $comment->created_at->diffForHumans() }} by</small>
                        <a href="{{ route('user.show', ['user' => $comment->user->id]) }}">
                            <small> {{ $comment->user->name }}
                                @if ($comment->user->id == $post->user->id)
                                    <span class="badge bg-secondary">Author</span>
                                @endif
                            </small>
                        </a>

                        @auth
                            @if ($comment->user->id == Auth::user()->id)
                                <div class="row mb-1 ps-2 mt-2">
                                    <div>
                                        <form method="POST" class="fm-inline"
                                            action="{{ route('blog.comments.destroy', ['comment' => $comment->id, 'blog' => $post ->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger" />
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </li>
            @empty
                <p class="text-danger"> No comments found! </p>
            @endforelse
        </ul>
    </div>
@endsection
