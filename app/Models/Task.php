<?php

namespace App\Models;

use App\Database\DB;
use PDO;

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

       
    }

    public function addLabel($labelId, $taskId)
    {
        $query = $this->connection->prepare('INSERT INTO labels_tasks VALUES (:label_id, :task_id)');
        $query->execute([
            'label_id' => $labelId,
            'task_id' => $taskId
        ]);
    }
    
    public function getLabel($id){
        $query = $this
        ->connection
        ->prepare('SELECT labels.* FROM labels JOIN labels_tasks ON labels_tasks.label_id = labels.id WHERE labels_tasks.task_id = :id');
     $query->execute(['id' => $id]);

    return $query->fetchAll();
    }
    
    // public function all()
    // {

    //     $query = $this->connection->prepare("SELECT * FROM $this->table");
    //     $query->execute();
    //     return $query->fetchAll(PDO::FETCH_CLASS, Task::class);
    // //    $result=parent::all();
    // //    foreach($result as $value){
    // //         $task=new Task();
    // //         $task->group_id=$value->group_id;
    // //         $task->title=$value->title;
    // //         $task->description=$value->description;
    // //    }
    // }
}