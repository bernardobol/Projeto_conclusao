<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index() {
        $users = User::where("id", "<>", 1)->get();

        return view("users", [
            "users" => $users
        ]);
    }

    public function create() {
        $user = new User();

        return view("user", [
            "user" => $user
        ]);
    }

    public function edit($id) {
        $user = User::find($id);

        return view("user", [
            "user" => $user
        ]);
    }

    public function store(Request $request) {
        $rules = [
            "name" => "required|min:2",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed"
        ];

        $messages = [
            "name.required" => 
                "O campo nome deve ser preenchido",
            "name.min" => 
                "O campo nome deve ter pelo menos 2 caracteres",
            "email.required" => 
                "O campo e-mail deve ser preenchido",
            "email.email" => 
                "O campo e-mail deve conter um endereço de e-mail válido",
            "email.unique" => 
                "Já existe este e-mail cadastrado no sistema",
            "password.required" =>
                "O campo senha deve ser preenchido",
            "password.min" => 
                "O campo senha deve ter pelo menos 6 caracteres",
            "password.confirmed" => 
                "As senhas não conferem"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("usuariosnovo")
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->save();

        return redirect()->route("usuarios");
    }

    public function update($id, Request $request) {
        $rules = [
            "name" => "required|min:2",
            "email" => "required|email|unique:users,email,$id",
            "password" => "confirmed"
        ];

        $messages = [
            "name.required" => 
                "O campo nome deve ser preenchido",
            "name.min" => 
                "O campo nome deve ter pelo menos 2 caracteres",
            "email.required" => 
                "O campo e-mail deve ser preenchido",
            "email.email" => 
                "O campo e-mail deve conter um endereço de e-mail válido",
            "email.unique" => 
                "Já existe este e-mail cadastrado no sistema",
            "password.confirmed" => 
                "As senhas não conferem"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()
                    ->route("usuariosform", ["id" => $id])
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = User::find($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");

        if($request->input("password")) {
            $user->password = $request->input("password");
        }

        $user->save();

        return redirect()->route("usuarios");
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->route("usuarios");
    }

}