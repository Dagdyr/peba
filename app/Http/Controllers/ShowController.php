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
        if (count(Post::where('user_id', '!=', auth()->user()->getAuthIdentifier())->get())){
            return view('welcome');
        }else{
            return view('empWelcome');
        }
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


    public function search(Request $request){
        if ($request->search == null){
            $id = auth()->user()->getAuthIdentifier();
            $users = User::where('id', '!=' , $id)->inRandomOrder()->paginate(20);
            $searchRequest = '';
            return view('search', ['users'=>$users, 'searchRequest'=>$searchRequest]);
        }
        else{
            $search = $request->search;
            $searchArr =  explode(' ', $search);
            if (count($searchArr)<2 or $searchArr[1] == ' '){
                $users = User::where('name', 'LIKE', "%{$searchArr[0]}%")->orwhere('lastname', 'LIKE', "%{$searchArr[0]}%" )->paginate(20);
                $searchRequest = $searchArr[0];
                return view('search', ['users'=>$users, 'searchRequest'=>$searchRequest]);
            }else{
                 $name = $searchArr[0];
                 $lastname = $searchArr[1];
                 $users = User::where('name', 'LIKE', "%{$name}%")->where('lastname', 'LIKE', "%{$lastname}%")->orwhere('name', 'LIKE', "%{$lastname}%")->where('lastname', 'LIKE', "%{$name}%")->paginate(20);
                 $searchRequest = $searchArr[0].' '.$searchArr[1];
                return view('search', ['users'=>$users, 'searchRequest'=>$searchRequest]);
            }


        }
    }


    }

