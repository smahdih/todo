<?php

namespace App\Models;

use App\Database\DB;

class Label extends DB {

    protected $table = 'labels_tasks';
    protected $columns = [
        'label_id',
        'task_id'
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