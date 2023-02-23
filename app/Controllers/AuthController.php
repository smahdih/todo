<?php

namespace App\Controllers;

use App\Core\Render;
use App\Core\Request;
use App\Models\User;
use App\Requests\Validation;

class AuthController
{
    public function showLogin()
    {
        return Render::view('contents/auth/login');
    }
    public function login(Request $request)
    {
        $validation = new Validation($request->toArray());
        $validation->validate([
            'email' => ['require', 'email'],
            'password' => ['maxlen:8', 'require']
        ]);

        if (empty($validation->response)) {
            $user = new User();
            $user = $user->findByColumn('email', $request->email);

            if ($user->password === md5($request->password)) {
                if (!$user->isActive()) {
                    $_SESSION['errors'] = ['notActive' => 1];
                    return route('/auth/login/show');
                }

                $_SESSION['user'] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'phone_number' => $user->phone_number,
                    'type' => $user->type,
                    'specs' => (bool)$user->userHasSpec(),
                ];
                return route('/');
            } else {
                $_SESSION['errors'] = ['ontOk' => 1];
                return route('/auth/login/show');
            }

        } else {
            $_SESSION['errors'] = ['ontOk' => 1];
            return route('/auth/login/show');
        }
    }

    public function showRegister()
    {
        return Render::view('contents/auth/register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->type = $request->type;
        $user->verified = ($request->type === "DOCTOR" or $request->type === "ADMIN") ? 0 : 1;
        $user->password = md5($request->password);
        $user->save();

        return route('/auth/login/show');
    }

    public function exit()
    {
        $_SESSION['user'] = "";
        return route('/');
    }
}
