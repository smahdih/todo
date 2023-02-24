<?php

namespace App\Controllers;

use App\Core\Render;
use App\Core\Request;
use App\Helper\Session;
use App\Models\Group;
use App\Models\User;
use App\Requests\Validation;
use App\Traits\UserLoginTrait;

class GroupController
{
    use UserLoginTrait;

    public function index()
    {
        if (!$this->checkLogin()) {
            return route('/auth/login/show');
        }

        $groups = (new Group())->all();
        return Render::view('/contents/groups/index', [
            'groups' => $groups,
        ]);
    }

    public function show(Request $request)
    {
        $group = (new Group())->find($request->id);
        $groupUsers = $group->getUsers($request->id);
        $users = (new User())->all();
        return Render::view('/contents/groups/show', [
            'group' => $group,
            'groupUsers' => $groupUsers,
            'users' => $users
        ]);
    }

    public function addUser(Request $request)
    {
        $group = new Group();
        $group->addUser($request->group, $request->user);

        return route('/groups');
    }

    public function create()
    {
        return Render::view('/contents/groups/groupCreate');
    }

    public function store(Request $request)
    {
        $validation = new Validation($request->toArray());
        $validation->validate([
            'name' => ['required', 'minlen:2', 'maxlen:30']
        ]);

        if (!empty($validation->response)) {
            Session::set('errors', $validation->response);
            return route('/groups/create');
        }

        $group = new Group();
        $group->create($request->toArray());

        return route('/groups');
    }

    public function delete(Request $request)
    {
        $group = (new Group())->delete($request->id);

        return route('/groups');
    }

    public function update(Request $request, $id)
    {
    }

}
