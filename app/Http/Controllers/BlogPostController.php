<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $posts = BlogPost::withCount('comments')->with('user')->latest()->paginate(10);
        // dd($posts);
        return view('blog.blog', compact('posts'));
    }

    public function create()
    {
        return view('blog.add');
    }

    public function store(BlogPostRequest $request)
    {
        $blog = BlogPost::make($request->validated());
        $blog->user_id = Auth::user()->id;
        $blog->save();
        Return redirect(route('blog.index'));
    }

    public function show($id)
    {
        $post = BlogPost::with('comments', 'user')->findOrFail($id);
        return view('blog.post', compact('post'));
    }

    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(BlogPostRequest $request, $id)
    {
        $blog = BlogPost::findOrFail($id);
        
        $validatedData = $request->validated();
        $blog->update($validatedData);
        Return redirect(route('blog.show', ['blog' => $id]));
    }

    public function destroy($id)
    {
        $blog = BlogPost::findOrFail($id);
        $this->authorize($blog);

        $blog->delete();
        Return redirect(route('blog.index'));
    }
}
