<?php

namespace App\Models;

use App\Database\DB;

class User extends DB
{
    protected $table = 'users';
    protected $columns = [
        'name',
        'username',
        'email',
        'phone_number',
        'type',
        'verified',
        'password'
    ];

    public $specs;

    public function __construct()
    {
        parent::__construct();

        foreach ($this->columns as $value) {
            $this->{$value} = null;
        }
    }

    public function verifiedDoctors()
    {
        $query = $this->connection->prepare("SELECT * FROM $this->table WHERE type = :type AND verified = :verified");

        $query->execute(['type' => "DOCTOR", "verified" => "1"]);
        return $query->fetchAll();
    }

    public function isActive()
    {
        return $this->verified;
    }

    public function setActive()
    {
        $query = $this->connection->prepare("UPDATE $this->table SET verified = :verified WHERE id = :id");

        $query->execute(['verified' => 1, "id" => $this->id]);
        return $this;
    }

    public function setDeActive()
    {
        $query = $this->connection->prepare("UPDATE $this->table SET verified = :verified WHERE id = :id");

        $query->execute(['verified' => 0, "id" => $this->id]);
        return $this;
    }

    public function userHasSpec()
    {
        if ($this->type == "DOCTOR") {
            $query = $this->connection->prepare("SELECT doctor_specs.* FROM doctor_specs, users WHERE doctor_specs.user_id = :id");

            $query->execute(['id' => $this->id]);
            return $query->fetchObject();
        }
    }
}
