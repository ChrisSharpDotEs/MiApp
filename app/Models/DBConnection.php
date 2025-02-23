<?php

namespace MiApp\Models;

use Exception;

class DBConnection
{
    protected $conn;

    public function __construct()
    {
        $host = getenv('DB_HOST');
        $database = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $this->conn = mysqli_connect($host, $username, $password, $database);
        
        if (!$this->conn) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }
    }
    public function query($query)
    {
        try {
            $result = mysqli_query($this->conn, $query);
            $this->close();
            return $result;
        } catch (Exception $e){
            $this->close();
            return $e;
        }
        
    }
    public function close()
    {
        mysqli_close($this->conn);
    }
}
