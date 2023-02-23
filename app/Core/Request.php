<?php

namespace App\Core;

class Request
{
    const RULES = [
        'require',
        'maxlen',
        'email',
        'minlen'
    ];

    public function __construct()
    {
        foreach ($_REQUEST as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function toArray() : array
    {
        return (array) $this;
    }
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function validate(array $rules){
        foreach($rules as $fieldName=>$rule){
            if(in_array($rule,self::RULES)){
                call_user_func($rule($this->request[$fieldName]));
            }
        }
    }
}
