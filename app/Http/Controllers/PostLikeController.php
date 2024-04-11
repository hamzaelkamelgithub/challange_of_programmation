<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

// i use that for like and unlike Posts.
class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $user = auth()->user();

        // Check if the user has already liked the post
        if (!$user->likedPosts->contains($post)) {
            // Create a new like record
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $post->id;
            $like->save();

            return redirect()->back()->with('success', 'Post liked successfully!');
        }

        return redirect()->back()->with('error', 'You have already liked this post!');
    }

    public function unlike(Post $post)
    {
        $user = auth()->user();

        // Find the like record for the user and post
        $like = Like::where('user_id', $user->id)->where('post_id', $post->id)->first();

        // If like record exists, delete it
        if ($like) {
            $like->delete();
            return redirect()->back()->with('success', 'Post unliked successfully!');
        }

        return redirect()->back()->with('error', 'You have not liked this post yet!');
    }
}