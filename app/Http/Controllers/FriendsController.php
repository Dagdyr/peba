<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Models\User ;


class FriendsController extends Controller
{
    public function ShowAllFriends(Request $request, $userId)
    {
        $user = User::where('id', $userId)->first();
        if ($user->id == auth()->user()->getAuthIdentifier()){
            return redirect('/friends');
        }else{
        $friends =  $user->allFriends();
        return view('friends.Userfriends', compact('friends', 'user'));
        }
    }
    public function ShowAllMyFriends()
    {
        $user = auth()->user();
        $friends =  $user->allFriends();
        $applications = $user->friendApplication;
        return view('friends.friends', compact('friends', 'applications'));
    }

    public function sendRequest(Request $request, $userId)
    {
        $user = auth()->user();

        if($user->id == $userId) {
            return redirect()->back()->withErrors('Вы не можете добавить себя в друзья!');
        }elseif(Friend::where('user_id', $user->id)->where('friend_id', $userId)->exists()){
            return json_encode(['result'=>'send']);
        }
        else{
        $friend = new Friend();
        $friend->user_id = $user->id;
        $friend->friend_id = $userId;
        $friend->status = 'pending';
        $friend->save();

        return json_encode(['result'=>'success']);
        }
    }

    public function acceptApplicationRequest($requestId)
    {
        $id = auth()->user()->getAuthIdentifier();
        $user = User::where('id', $id)->first();
        $user->increment('friends_count');
        $user_friend = User::where('id', $requestId)->first();
        $user_friend->increment('friends_count');
        $friend = Friend::where('user_id', $requestId)
            ->where('friend_id', $id)->first();
        $friend->status = 'accepted';
        $friend->save();
        return json_encode(['result'=>'success']);
    }
    public function rejectApplicationRequest($requestId)
    {
        $id = auth()->user()->getAuthIdentifier();
        $friend = Friend::where('user_id', $requestId)
            ->where('friend_id', $id)->first()->delete();
        return json_encode(['result'=>'success']);
    }

    public function deleteFriend($requestId)
    {
        $id = auth()->user()->getAuthIdentifier();
        $user = User::where('id', $id)->first();
        $user->decrement('friends_count');
        $user_friend = User::where('id', $requestId)->first();
        $user_friend->decrement('friends_count');
        $friend = Friend::where('user_id', $id)
            ->where('friend_id', $requestId)
                ->orWhere('user_id', $requestId)
                    ->where('friend_id', $id)->first()->delete();
        return json_encode(['result'=>'success']);
    }
}
