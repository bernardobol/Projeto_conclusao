<?php

namespace App\Http\Controllers;



use App\Post;
use App\Http\Controllers\Controller;

class NoticiasController extends Controller {

    public function index(){
        $posts = Post::all()->where('active', true)->sortByDesc('created_at')->take(3);
        // dd($posts); - Dump and Die.

        return view("noticias",  ["posts" =>$posts]);
    }
}