<?php

class DBConnection
{
    protected $conn;
    private static $dbFile = __DIR__ . '/../Database/database.db';

    public function __construct()
    {
        try {
            $this->conn = new PDO('sqlite:' . self::$dbFile);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage() . "<br>Ruta al archivo: " . self::$dbFile);
        }
    }

    public function customQuery($query)
    {
        try {
            $result = $this->conn->query($query);
            return $result;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}

class DestroyUsers extends DBConnection
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this;
    }

    public function execute()
    {
        $this->deleteUsers();
    }

    private function deleteUsers() {
        $sql = "DELETE FROM users WHERE id != 1";

    if ($this->db->customQuery($sql)) {
        echo "Usuarios eliminados";
        return true;
    } else {
        echo "Error al eliminar usuarios.";
        return false;
    }
    }
}

$builder = new DestroyUsers();
$builder->execute();
