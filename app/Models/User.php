<?php

namespace App\Models;

use App\Database\DB;

class User extends DB
{
    protected $table = 'users';
    protected $columns = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
    ];

    public $specs;

    public function __construct()
    {
        parent::__construct();

        foreach ($this->columns as $value) {
            $this->{$value} = null;
        }
    }



}
