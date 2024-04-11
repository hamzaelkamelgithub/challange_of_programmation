<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

//  i use this contreoller for shoe form of create and store of it in database

class PostController extends Controller
{
    public function create()
{
    return view('posts_create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'content' => 'required',
        'title' => 'required|max:255',
    ]);

    $post = new Post();
    $post->title = $validatedData['title'];
    $post->content = $validatedData['content'];
    $post->user_id = auth()->user()->id;
    $post->save();

    return redirect()->route('home')->with('success', 'Post created successfully!');
}
}
