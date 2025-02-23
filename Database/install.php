<?php

class DBConnection {
    protected $conn;
    private static $dbFile = __DIR__ . '/../Database/database.db'; // Ruta relativa desde el directorio del script

    public function __construct() {
        try {
            $this->conn = new PDO('sqlite:' . self::$dbFile); // self:: para acceder a la propiedad estática
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage() . "<br>Ruta al archivo: " . self::$dbFile); // die() para detener la ejecución
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

class BuildDataBase extends DBConnection {
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this; // $this en lugar de new DBConnection()
    }

    public function execute() {
        $this->createTableUsers();
        echo $this->insertDefaultUser();
        $this->close();
    }

    private function createTableUsers() {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

        if ($this->db->customQuery($sql)) {
            echo "Tabla 'usuarios' creada o ya existente.";
            return true;
        } else {
            echo "Error al crear la tabla.";
            return false;
        }
    }

    private function insertDefaultUser() {
        $nombre = 'invitado';
        $email = 'invitado@example.com';
        $password = 'invitadopass';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "El correo electrónico no es válido.";
        }

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() > 0) {
            return "Ya existe un usuario con ese correo electrónico.";
        }

        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $password_hashed]);

        return "Usuario creado correctamente.";
    }
}

$builder = new BuildDataBase();
$builder->execute();