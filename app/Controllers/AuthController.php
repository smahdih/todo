<?php

namespace App\Controllers;

use App\Core\Render;
use App\Core\Request;
use App\Helper\Session;
use App\Models\User;
use App\Requests\Validation;

class AuthController
{
    public function showLogin()
    {
        return Render::view("contents/auth/login");
    }

    public function login(Request $request)
    {
        $validation = new Validation($request->toArray());
        $validation->validate([
            "email" => ["require", "email"],
            "password" => ["maxlen:8", "require"],
        ]);

        if (!empty($validation->response)) {
            Session::set("errors", ["notOk" => 1]);
            return route("/auth/login/show");
        }

        $user = new User();
        $user = $user->findByColumn("email", $request->email);

        if ($user->password === md5($request->password)) {
            Session::set("user", [
                "id" => $user->id,
                "name" => $user->name,
                "username" => $user->username,
                "email" => $user->email,
                
            ]);

            Session::setAdmin($user->is_admin);
            return route("/");
        }
    }


    public function showRegister()
    {
        return Render::view("contents/auth/register");
    }

    public function register(Request $request)
    {
        $validation = new Validation($request->toArray());
        $validation->validate([
            "name" => ["require", "minlen:2", "maxlen:50"],
            "username" => ["require", "minlen:2", "maxlen:20"],
            "email" => ["require", "email"],
            "password" => ["maxlen:8", "require"],
        ]);

        if (! empty($validation->response)) {
            Session::set("errors", $validation->response);
            return route("/auth/register/show");
        }

        $request->password = md5($request->password);
        $request->is_admin = 0;

        $user = new User();
        $user->create($request->toArray());

        return route("/auth/login/show");
    }

    public function exit()
    {
        Session::remove("user");
        return route("/");
    }
}
