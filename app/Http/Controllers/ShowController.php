<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function ShowUserProfile($userId){
        $id = auth()->user()->getAuthIdentifier();
        if ($userId == $id){
            return redirect()->route('MyProfile.edit');
        }else{
            $posts = User::find($userId)->posts;
            $user = User::where('id', $userId)->first();
            return view('profile.edit', ['posts'=>$posts, 'user'=>$user]);
        }

    }
    public function ShowMyProfile(){
        $id = auth()->user()->getAuthIdentifier();
        $posts = User::find($id)->posts;
        $user = User::where('id', $id)->first();
        return view('profile.MyProfile', ['posts'=>$posts, 'user'=>$user]);
    }
}
