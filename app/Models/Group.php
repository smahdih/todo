<?php

namespace App\Models;
use App\Database\DB;

class Group extends DB
{

    protected $table = 'groups';
    protected $columns = [
        'name',
    ];

    public function __construct()
    {
        parent::__construct();

        foreach ($this->columns as $value) {
            $this->{$value} = null;
        }
    }

    public function getUsers($id)
    {
        $query = $this
            ->connection
            ->prepare('SELECT users.* FROM users JOIN groups_users ON groups_users.user_id = users.id WHERE groups_users.group_id = :id');
        $query->execute(['id' => $id]);

        return $query->fetchAll();
    }

    public function addUser($groupId, $userId)
    {
        $query = $this->connection->prepare('INSERT INTO groups_users VALUES (:user_id, :group_id)');
        $query->execute([
            'user_id' => $userId,
            'group_id' => $groupId
        ]);
    }

}
