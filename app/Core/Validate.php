<?php

namespace App\Core;
use App\Requests\Validation;

class Validate
{
    public $request;
    const RULES = [
        'require',
        'maxlen',
        'email',
        'minlen'
    ];
    public $response = [];

    public  $limit ="";
    public function __construct($req)
    {
        $this->request = $req;
    }

    public function all(): array
    {
        return $this->request;
    }

    public function validate(array $array)
    {
       
        
        foreach ($array as $fieldName => $rules) {
            foreach($rules as $rule){
                if (strstr($rule, ":")) {
                    $newrule = explode(":", $rule);
                    $rule = $newrule[0];
                    $this->limit = $newrule[1];
                }
                if (in_array($rule, self::RULES)) {
                    if(($validation=Validation::set($rule, $this->request[$fieldName], $this->limit))!==true){
                        $this->response[$fieldName]= $validation;
                    }
                      
                    }
                
            }
        }
    }
}
