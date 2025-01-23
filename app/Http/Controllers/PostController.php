<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::with('user')->orderBy('id', 'desc')->get();

        return view('web.sections.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /* if (Gate::denies('create-post')){

            abort(403, 'Unauthorized action.');
        }*/

        return view('web.sections.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /* if (Gate::denies('create-post')){

            abort(403, 'Unauthorized action.');
        }*/

        $credentials = $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        Post::create([
            'title' => $credentials['title'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::query()->findOrFail($id);

        /*if (Gate::denies('update-post', $post)){

            abort(403, 'Unauthorized action.');
        }*/

        return view('web.sections.posts.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::query()->findOrFail($id);

        $credentials = $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        $post->update($credentials);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::query()->findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
