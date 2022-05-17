<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function index(){
        $categories = Category::all();
        // dd($categories); - Dump and Die.

        return view("categories",  ["categories" =>$categories]);
    }

    public function create(){
        $category = new Category();

        return view("category", ["category" => $category]);
    }

    public function edit($id){
        $category = Category::find($id);

        return view("category", ["category" => $category]);
    }

    public function store(Request $request){
        $rules = [
            "name" => "required|min:2",
            "description" => "required|min:2"
        ];

        $messages = [
            "name.required" => "O campo nome deve ser preenchido",
            "name.min" => "O campo nome deve ter pelo menos 2 caracteres",
            "description.required" => "O campo descrição deve ter pelo menos 2 caracteres",
            "description.min" => "O campo nome deve ter pelo menos 2 caracteres"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route("categoriasnovo")
            ->withErrors($validator)
            ->withInput();
        }

        $category = new Category();
        $category->name = $request->input("name");
        $category->description = $request->input("description");
        $category->save();

        return redirect()->route("categorias");
    }

    public function update($id, Request $request){

        $rules = [
            "name" => "required|min:2",
            "description" => "required|min:2"
        ];

        $messages = [
            "name.required" => "O campo nome deve ser preenchido",
            "name.min" => "O campo nome deve ter pelo menos 2 caracteres",
            "description.required" => "O campo descrição deve ter pelo menos 2 caracteres",
            "description.min" => "O campo nome deve ter pelo menos 2 caracteres"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route("categoriasform", ["id" => $id])
            ->withErrors($validator)
            ->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->input("name");
        $category->description = $request->input("description");
        $category->save();

        return redirect()->route("categorias");
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->route("categorias");
    }


}