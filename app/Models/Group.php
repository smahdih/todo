<?php

namespace App\Models;
use App\Database\DB;

class Group extends DB
{

    protected $table = 'groups';
    protected $columns = [
        'id',
        'name',
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