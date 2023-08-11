<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    //Отображение профиля другого пользователя
    public function ShowUserProfile($userId)
    {
        $id = auth()->user()->getAuthIdentifier();
        if ($userId == $id) {
            return redirect()->route('MyProfile.edit');
        } else {
            $posts = Post::where('user_id', $userId)->latest()->get();
            $user = User::where('id', $userId)->first();
            return view('profile.edit', ['posts' => $posts, 'user' => $user]);
        }

    }

    //Отображение своего профиля
    public function ShowMyProfile()
    {
        $id = auth()->user()->getAuthIdentifier();
        $posts = User::find($id)->posts()->latest()->get();
        $user = User::where('id', $id)->first();
        return view('profile.MyProfile', ['posts' => $posts, 'user' => $user]);
    }

    public function loadPage(){
        return view('welcome');
    }

    //Отображение главной страницы и вывод на неё постов
    public function ShowAllPosts()
    {
        $id = auth()->user()->getAuthIdentifier();

        return Post::where('user_id', '!=', $id)->inRandomOrder()->with('user')->paginate(5)->map(function ($post) {
            $post->published_at_carbon = Carbon::parse($post->created_at);
            $post->published_at_formatted = $post->published_at_carbon->format('d  F  H:i');
            return $post;
        });
    }

   /* public function loadPosts(Request $request)
    {
        $id = auth()->user()->getAuthIdentifier();
            $page = $request->page;
            $Allposts = Post::where('user_id', '!=', $id)->inRandomOrder()->with('user')->get();
            $posts = $Allposts->except($result)->take(5)->map(function ($post) {
                $post->published_at_carbon = Carbon::parse($post->created_at);
                $post->published_at_formatted = $post->published_at_carbon->format('d  F  H:i');
                return $post;
            });
            $posts->toJson();
            return json_encode($posts);
            $posts = Post::where('user_id', '!=', $id)->inRandomOrder()->take(5)->with('user')->get()->map(function ($post) {
                $post->published_at_carbon = Carbon::parse($post->created_at);
                $post->published_at_formatted = $post->published_at_carbon->format('d  F  H:i');
                return $post;
            });
            $posts->toJson();
            return json_encode($posts);
        }}*/


    }

