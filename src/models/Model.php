<?php
class Model {
    protected static $tableName = 'users';
    protected static $columns = [];
    protected $values = [];

    
    function __construct($arr) {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr) {
        if($arr) {
            foreach($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function getSelect($filters = [], $columns = '*') {
        $sql = "SELECT $columns FROM " 
                . static::$tableName
                . self::getFilters($filters);
        return $sql;
    }

    public static function getFilters($filters) {
        $sql_filter = "";
        if (count($filters) > 0) {
            $sql_filter .= " WHERE 1 = 1 ";
            foreach($filters as $column => $value) {
                $sql_filter .= " AND ${column} = " 
                            . self::getFormatedValue($value) ; 
            }
        }

        return $sql_filter;
    } 

    public static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return ("'$value'");
        } else {
            return $value;
        }

        
    }
}

?>