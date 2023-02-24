<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Task;
use App\Core\Render;
use App\Core\Request;
use App\Requests\Validation;

class TaskController 
{
    public function index()
    {
        $task = new Task();
        $tasks = $task->all();
        return Render::view('contents/tasks/index', $tasks);
    }
    
    public function store(Request $request){

        $validation = new Validation($request->toArray());
        $validation->validate([
            'title' => ['required', 'minlen:2', 'maxlen:50'],
            'description'=>['required','minlen:5']
        ]);

        if (!empty($validation->response)) {
            Session::set('errors', $validation->response);
            return route('/tasks/create');
        }
        $request->is_done=0;
        $task=new Task();

        $task->create($request->toArray());
        return route("/groups/show?id=$request->group_id");

    }



}

