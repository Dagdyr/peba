<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\User ;
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
    // Function to return the name of a person on every call
    /* function generateRandomName()
    {
        $firstname = array(
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha',
        );

        $lastname = array(
            'Mischke',
            'Serna',
            'Pingree',
            'Mcnaught',
            'Pepper',
            'Schildgen',
            'Mongold',
            'Wrona',
            'Geddes',
            'Lanz',
            'Fetzer',
            'Schroeder',
            'Block',
            'Mayoral',
            'Fleishman',
            'Roberie',
            'Latson',
            'Lupo',
            'Motsinger',
            'Drews',
            'Coby',
            'Redner',
            'Culton',
            'Howe',
            'Stoval',
            'Michaud',
            'Mote',
            'Menjivar',
            'Wiers',
            'Paris',
            'Grisby',
            'Noren',
            'Damron',
            'Kazmierczak',
            'Haslett',
            'Guillemette',
            'Buresh',
            'Center',
            'Kucera',
            'Catt',
            'Badon',
            'Grumbles',
            'Antes',
            'Byron',
            'Volkman',
            'Klemp',
            'Pekar',
            'Pecora',
            'Schewe',
            'Ramage',
        );

        $name = $firstname[rand(0, count($firstname) - 1)];
        /*$name .= ' ';
        $name .= $lastname[rand(0, count($lastname) - 1)];

        return $name;
    }*/

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
