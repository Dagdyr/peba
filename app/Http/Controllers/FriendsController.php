<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;


class FriendsController extends Controller
{
    public function index()
    {
        $id = auth()->user()->getAuthIdentifier();
        $user = User::where('id', $id)->first();
        $friends = $user->friends;
        return view('friends.friends', compact('friends'));
    }

    public function add(Request $request)
    {
        $friend = User::find($request->friend_id);
        auth()->user()->friends()->attach($friend);
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $friend = User::find($request->friend_id);
        auth()->user()->friends()->detach($friend);
        return redirect()->back();
    }

    public function show(User $friend)
    {
        return view('friends.show', compact('friend'));
    }
}
