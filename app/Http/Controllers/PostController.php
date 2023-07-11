<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function addPost(Request $request){
        if ($request->hasFile('file')){
            $file = $request->file;
            $fileExtension = $file->getClientOriginalExtension();
            if ($fileExtension == 'jpg' or 'png' or 'gif' or 'mp4' or 'mov' or 'mpeg' or 'mpg' or 'webm'){
                $path = $file->storeAS('assets/images/post', $file->getClientOriginalName().'.'.$file->getClientOriginalExtension(), 'public');
                $content = $request->post_content;
                $id = auth()->user()->getAuthIdentifier();
                $post =  new \App\Models\Posts();
                $post->img = $path;
                $post->content = $content;
                $post->author_id = $id;
                $post->save();
            }else{
            return json_encode('Extension not supported');
            }
        }else{
            $content = $request->post_content;
            $id = auth()->user()->getAuthIdentifier();
            $post =  new \App\Models\Posts();
            $post->content = $content;
            $post->author_id = $id;
            $post->save();
        }


    }
}
