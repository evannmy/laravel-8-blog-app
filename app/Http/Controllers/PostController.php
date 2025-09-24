<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(Request $request) {
        $heading = 'All Post';

        if ($request->input('category')) {
            $category = Category::firstWhere('slug', $request->input('category'));
            $heading .= ' in ' . $category['name'];
        }

        if ($request->input('author')) {
            $author = User::firstWhere('username', $request->input('author'));
            $heading .= ' by ' . $author['name'];
        }

        return view('blog', [
            'title' => 'Blog',
            'active' => 'blog',
            'heading' => $heading,
            'search' => $request->input('search'),
            'category' => $request->input('category'),
            'author' => $request->input('author'),
            'posts' => Post::latest()->filters($request->all())->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'title' => 'Post Detail',
            'active' => 'blog',
            'post' => $post
        ]);
    }
}
