<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function index(){
        $posts = Post::all();
        // dd($posts); - Dump and Die.

        return view("posts",  ["posts" =>$posts]);
    }

    public function create(){
        $post = new Post();

        $categories = Category::all();

        return view("post", ["post" => $post, 
                    "categories"=>$categories]);
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view("post", ["post" => $post, 
        "categories"=>$categories]);
    }

    public function store(Request $request){
        $rules = [
            "category_id" => "required|exists:categories,id",
            "post_date" => "required",
            "title" => "required|min:2",
            "summary" => "required|min:2",
            "text" => "required",
            "active" => "required|boolean"
        ];

        $messages = [
            "post_date.required" => "O campo data deve ser preenchido",

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route("postagensnovo")
            ->withErrors($validator)
            ->withInput();
        }

        $post = new Post();
        $post->category_id = $request->input("category_id");
        $post->post_date = $request->input("post_date");
        $post->title = $request->input("title");
        $post->summary = $request->input("summary");
        $post->text = $request->input("text");
        $post->active = $request->input("active");
        $post->save();

        return redirect()->route("postagens");
    }

    public function update($id, Request $request){

        $rules = [
            "category_id" => "required|exists:categories,id",
            "post_date" => "required",
            "title" => "required|min:2",
            "summary" => "required|min:2",
            "text" => "required",
            "active" => "required|boolean"
        ];

        $messages = [
            "post_date.required" => "O campo data deve ser preenchido",


        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route("postagensform", ["id" => $id])
            ->withErrors($validator)
            ->withInput();
        }

        $post = Post::find($id);
        $post->category_id = $request->input("category_id");
        $post->post_date = $request->input("post_date");
        $post->title = $request->input("title");
        $post->summary = $request->input("summary");
        $post->text = $request->input("text");
        $post->active = $request->input("active");
        $post->save();
        

        return redirect()->route("postagens");
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route("postagens");
    }


}