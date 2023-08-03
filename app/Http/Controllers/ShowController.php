<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    //Отображение профиля другого пользователя
    public function ShowUserProfile($userId){
        $id = auth()->user()->getAuthIdentifier();
        if ($userId == $id){
            return redirect()->route('MyProfile.edit');
        }else{
            $posts = Post::where('user_id', $userId)->latest()->get();
            $user = User::where('id', $userId)->first();
            return view('profile.edit', ['posts'=>$posts, 'user'=>$user]);
        }

    }

    //Отображение своего профиля
    public function ShowMyProfile(){
        $id = auth()->user()->getAuthIdentifier();
        $posts = User::find($id)->posts()->latest()->get();
        $user = User::where('id', $id)->first();
        return view('profile.MyProfile', ['posts'=>$posts, 'user'=>$user]);
    }

    //Отображение главной страницы и вывод на неё постов
    public function ShowAllPosts(){
        $id = auth()->user()->getAuthIdentifier();
        $posts = Post::where('user_id','!=', $id)->inRandomOrder()->take(5)->get();
        return view('welcome', ['posts'=>$posts]);
    }
}
