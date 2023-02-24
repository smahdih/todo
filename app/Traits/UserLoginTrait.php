<?php

namespace App\Traits;

use App\Helper\Session;

trait UserLoginTrait
{
    public function checkLogin() : bool
    {
        if (!Session::has('user'))
        {
            return false;
        }

        return true;
    }
}
