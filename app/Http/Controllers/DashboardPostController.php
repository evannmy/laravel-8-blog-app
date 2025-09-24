<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        
        return view('dashboard.posts', [
            'posts' => Post::where('user_id', $userId)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'file|image|max:2048',
            'body' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = strip_tags(Str::of($validated['body'])->limit(250));

        Post::create($validated);
        
        return redirect('/dashboard/posts')->with('message', 'Post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('dashboard.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $oldImage = $post->image;

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'file|image|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $oldImage);
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = strip_tags(Str::of($validated['body'])->limit(250));

        Post::where('id', $post->id)
            ->update($validated);
        
        return redirect('/dashboard/posts')->with('message', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        if ($post->image != null) {
            Storage::delete('public/' . $post->image);
        }

        return redirect('/dashboard/posts')->with('message', 'Post has been deleted');
    }

    public function createSlug(Request $request) {
        $username = $request->query('username');
        $title = $request->query('title');
        return response()->json([
            'slug' => Str::of($title)->slug('-') . '-by-' . $username
        ]);
    }
}
