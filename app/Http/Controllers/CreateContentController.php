<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class CreateContentController extends Controller
{
    public function create()
    {
        return User::create([
            'name' => rand(99999, 99999),
            'lastname' => rand(99999, 99999),
            'email' => rand(99999, 99999).'@gmail.com',
            'birthday' => rand(1900, 2020).'-'.rand(1,12).'-'.rand(1, 30),
            'password' => '$2y$10$KZ1VXU0idvVt3k5dfqxZDO2X1NudtKbCMcIAtupDSYToN2nh4/35u',
        ]);
    }
    public function createFriend()
    {
        for ($i = 3; $i <= 18; $i++){
             $friend = new Friend();
             $friend->user_id = auth()->user()->getAuthIdentifier();
             $friend->friend_id = $i;
             $friend->status = 'accepted';
             $friend->save();
        }
    }
    public function createPosts($id)
    {
        for ($i = 1; $i <= 15; $i++){
            $user = User::where('id', $i)->first();
             $post = new Post();
             $post->user_id = $id;
             $post->content = $user->name.rand(9999999999, 99999999999).$user->lastname.$user->about;
             $post->img = 'images/post/1by1/0'.rand(1,7).'.jpg';
             $post->save();
        }
    }
}
