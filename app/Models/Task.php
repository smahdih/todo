<?php

namespace App\Models;

use App\Database\DB;

class Task extends DB {

    protected $table = 'tasks';
    protected $columns = [
        'id',
        'group_id',
        'description',
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