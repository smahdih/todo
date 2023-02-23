<?php
namespace App\Requests;
use App\Core\Validate;

class Validation extends Validate
{

    public static function set($rule,$fieldName,$limit){
       return self::$rule($fieldName,$limit);
    }
    public static function require($request)
    {
        if (empty($request)) {
            return "this field is required";
        }
        return true;
    }

    public static function maxlen($request,$limit)
    {

        if (strlen($request) > $limit) {
            return "must have maximum of $limit characters";
        }
        return true;
    }
    public static function minlen($request,$limit)
    {
        if (strlen($request) < $limit) {
            return "must be at least $limit characters";
        }
        return true;
    }
    public static function email($request)
    {
        if (filter_var($request, FILTER_VALIDATE_EMAIL)) { 
            return true;
        }
        return "this is not an email";
    }
}