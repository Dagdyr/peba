<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function addPost(Request $request){
        $content = $request->content; //
        $id = auth()->user()->getAuthIdentifier();
        $post =  new \App\Models\Posts(); // Модель Posts
        $post->content = $content; // Значение столбца content
        $post->author_id = $id; // Значение столбца author_id
        $post->title = "title";
        $post->save(); // Сохраняем в БД
    }
}
