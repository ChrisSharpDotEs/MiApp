<?php

namespace MiApp\Models;

use Exception;

class DBConnection
{
    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("db", "invitado", "4aabcdE1f3A", "renderapp");
        
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
