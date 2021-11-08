<?php

class Database {
    // method that returns the connection
    public static function getConnection(){
        $envPath = realpath(dirname(__FILE__) . "/../env.ini");
        $env = parse_ini_file($envPath);
        // conn = mysqli var
        $conn = new mysqli($env['host'], $env['username'], 
            $env['password'], $env['database']);


        if($conn->connect_error) {
            die("Error: " . $conn->connect_error);
        }

        return $conn;
    }

    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}

?>