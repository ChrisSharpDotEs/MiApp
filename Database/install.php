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

class BuildDataBase extends DBConnection
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this;
    }

    public function execute()
    {
        $this->dropDatabase();
        $this->createTableUsers();
        $this->createTablePosts();
        $this->insertDefaultUser();
        $this->insertDefaultPosts();
        $this->close();
    }

    private function dropDatabase()
    {
        $sql = "DROP TABLE users ";
        if ($this->db->customQuery($sql)) {
            echo "Table users deleted.";
        }
        $sql = "DROP TABLE posts ";
        if ($this->db->customQuery($sql)) {
            echo "Table posts deleted.";
        }
    }

    private function createTableUsers()
    {
        $sql = "CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            token TEXT UNIQUE,
            fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

        if ($this->db->customQuery($sql)) {
            echo "Tabla 'usuarios' creada.";
            return true;
        } else {
            echo "Error al crear la tabla.";
            return false;
        }
    }
    private function createTablePosts()
    {
        $sql = "CREATE TABLE posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            id_user INTEGER NOT NULL,
            title TEXT NOT NULL,
            description TEXT,
            img_url TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_user) REFERENCES Users(id)
        );";
        if ($this->db->customQuery($sql)) {
            echo "Tabla 'posts' creada.";
            return true;
        } else {
            echo "Error al crear la tabla posts.";
            return false;
        }
    }

    private function insertDefaultUser()
    {
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
            echo "Ya existe un usuario con ese correo electrónico.";
            return false;
        }

        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $password_hashed]);

        echo "Usuario creado correctamente.";
        return true;
    }
    private function insertDefaultPosts()
    {
        $sql = "INSERT INTO posts (id_user, title, description, img_url) VALUES
            (1, 'Mi primer post', 'Este es el contenido de mi primer post.', './public/img/benijo.webp'),
            (1, 'Un post interesante', 'Aquí hay información relevante sobre un tema.', NULL),
            (1, 'Otro post más', 'Solo para probar que puedo insertar varios posts.', './public/img/teide.webp');";

        if ($this->db->customQuery($sql)) {
            echo "Datos insertados en posts";
            return true;
        } else {
            echo "Error al insertar datos en posts";
            return false;
        }
    }
}

$builder = new BuildDataBase();
$builder->execute();
