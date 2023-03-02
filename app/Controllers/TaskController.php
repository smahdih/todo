<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Group;
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
        return Render::view('contents/tasks/index',  [
            'tasks' => $tasks
        ]);
        
    
    }

    public function show(Request $request){
        $group = (new Group())->find($request->id);
        $grouptasks = $group->getTasks($request->id);
        $tasks=(new Task)->all();
        return Render::view('/contents/groups/show', [
            'group' => $group,
            'grouptasks' => $grouptasks,
            'tasks' => $tasks
            
        ]);
    }
    
    public function store(Request $request){

        
        $validation = new Validation($request->toArray());
        $validation->validate([
            'title' => ['required', 'minlen:2', 'maxlen:50'],
            'description'=>['required','minlen:5']
        ]);

        if (!empty($validation->response)) {
            Session::set('errors', $validation->response);
            return route("/groups/show?id=$request->group_id");
        }
        $request->is_done=0;
        $task=new Task();

        $task->create($request->toArray());
        return route("/groups/show?id=$request->group_id");

    }




}

