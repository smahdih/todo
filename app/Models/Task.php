<?php

namespace App\Models;

use App\Database\DB;

class Task extends DB {

    protected $table = 'tasks';
    protected $columns = [
        'group_id',
        'description',
        'title',
        'is_done'
    ]; 



    public $specs;

    public function __construct()
    {
        parent::__construct();

        foreach ($this->columns as $value) {
            $this->{$value} = null;
        }
    }

    public function addLabel($labelId, $taskId)
    {
        $query = $this->connection->prepare('INSERT INTO labels_tasks VALUES (:label_id, :task_id)');
        $query->execute([
            'label_id' => $labelId,
            'task_id' => $taskId
        ]);
    }
    
    
    
}