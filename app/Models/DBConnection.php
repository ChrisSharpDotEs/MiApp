<?php

namespace MiApp\Models;

use Exception;
use PDO;
use PDOException;

class DBConnection {
    protected $conn;
    private static $dbFile = './Database/database.db';

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

    public function close() {
        $this->conn = null;
    }
}