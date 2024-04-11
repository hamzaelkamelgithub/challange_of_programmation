<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

// this is for show the posts of all usesr
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $posts = Post::latest()->paginate(10);
        $user_id = 1;
        $user = User::findOrFail($user_id);
        $likes = Post::withCount('likes')->latest()->get();
        return view('home', compact('posts' , 'user' , 'likes' , ));
    }
}
