<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

// i use that controller for follow and unfollow user and show the counter of follow in profile
class FollowController extends Controller
{
    public function profil()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();
        
        // Fetch the count of followers for the authenticated user
        $followerCount = Follow::where('follower_id', $user->id)->count();

        // Return the view with the user data and follower count
        return view('profil', compact('user', 'followerCount'));
    }
    public function follow(Request $request, $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        auth()->user()->followings()->attach($user);
    
        return redirect()->back()->with('success', 'You are now following ' . $user->name);
    }
    
    public function unfollow(Request $request, $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        auth()->user()->followings()->detach($user);
    
        return redirect()->back()->with('success', 'You have unfollowed ' . $user->name);
    }
    
}
