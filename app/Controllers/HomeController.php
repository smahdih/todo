<?php

namespace App\Controllers;

use App\Core\Render;
use App\Models\User;

class HomeController
{
    public function home()
    {
        return Render::view('contents/home/index');
    }
}
