<?php

namespace MiApp\Models;

use Exception;
use PDO;
use PDOException;

class DBConnection {
    protected $conn;
    private static $dbFile = '/var/www/html/Database/database.db';

    public function __construct() {
        try {
            $this->conn = new PDO('sqlite:' . DBConnection::$dbFile);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage() . "<br>";
            echo "Ruta al archivo: " . DBConnection::$dbFile . "<br>";
            exit;
        }
    }

    public function customQuery($query) {
        try {
            $result = $this->conn->query($query);
            return $result;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public function close() {
        $this->conn = null;
    }
}