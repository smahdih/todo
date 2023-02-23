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
                $_SESSION['user'] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                ];
                return route('/');
            }
        } else {
            $_SESSION['errors'] = ['notOk' => 1];
            return route('/auth/login/show');
        }
    }

    public function showRegister()
    {
        return Render::view('contents/auth/register');
    }

    public function register(Request $request)
    {
        $validation = new Validation($request->toArray());
        $validation->validate([
            'name' => ['require', 'minlen:2', 'maxlen:20'],
            'username' => ['require', 'minlen:2', 'maxlen:20'],
            'email' => ['require', 'email'],
            'password' => ['maxlen:8', 'require']   
        ]);

        if (empty($validation->response)) {
        
                $user = new User();
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = md5($request->password);
                $user->is_admin = 0;
                $user->save();
                return route('/auth/login/show');
            
        } else {
            $_SESSION['errors'] = $validation->response;
            return route('/auth/register/show');
        }
    }
    

    public function exit()
    {
        $_SESSION['user'] = "";
        return route('/');
    }
}
