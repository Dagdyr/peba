<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function addPost(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $id = auth()->user()->getAuthIdentifier();
            $post = new \App\Models\Posts();
            $fileExtension = $file->getClientOriginalExtension();
            if ($fileExtension == 'jpg' or 'jpeg' or 'png' or 'gif') {
                $name = time() . $id . "." . $fileExtension;
                $file->storeAs('assets/images/post', $name, 'public');
            } else {
                return json_encode(['result'=>'error']);
            }
            $path = 'images/post/' . $name;
            $post->img = $path;
            $content = $request->post_content;
            $post->content = $content;
            $post->user_id = $id;
            $post->save();
            return json_encode(['result'=>'success']);
        } else {
            $content = $request->post_content;
            $id = auth()->user()->getAuthIdentifier();
            $post = new \App\Models\Posts();
            $post->content = $content;
            $post->user_id = $id;
            $post->save();
            return json_encode(['result'=>'success']);
        }


    }
}
