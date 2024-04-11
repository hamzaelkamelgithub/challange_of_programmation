<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

// this contreoller is juste show thw inforamtion of user
class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profil', compact('user'));
    }
}
