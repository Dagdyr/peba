<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function addPost(Request $request){
        if ($request->hasFile('file')){
            $path = [];
            $files = [];
            $files = $request->file('file');
            $i=0;
            $post =  new \App\Models\Posts();
            while ($i<4){
                $fileExtension = $files[$i]->getClientOriginalExtension();
                if ($fileExtension == 'jpg' or 'jpeg' or 'png' or 'gif'){
                    $path[] = $files[$i]->store('assets/images/post', 'public');
                    $i++;
                }else{
                    return json_encode('Extension not supported');
                }
            }

            $post->img = implode('; ', $path);
            $content = $request->post_content;
            $id = auth()->user()->getAuthIdentifier();
            $post->content = $content;
            $post->author_id = $id;
            $post->save();

        }else{
            $content = $request->post_content;
            $id = auth()->user()->getAuthIdentifier();
            $post =  new \App\Models\Posts();
            $post->content = $content;
            $post->author_id = $id;
            $post->save();
        }


    }
    public function showMyPosts(){
        $id = auth()->user()->getAuthIdentifier();
        $MyPosts = Posts::where('author_id', $id)->all();
        return response()->json($MyPosts);
    }
}
