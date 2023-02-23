<?php

namespace App\Controllers;

use App\Models\Task;
use App\Core\Render;

class TaskController 
{
    public function index()
    {
        $task = new Task();
        $tasks = $task->all();
        return Render::view('contents/tasks/index', $tasks);
    }
    
    



}

