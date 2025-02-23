<?php

namespace MiApp\Models;

use ErrorException;
use Exception;
use MiApp\Models\DBConnection;
use PDO;

class User extends DBConnection
{
    public $id;
    public string $name;
    public string $lastname;
    public string $password;
    public string $email;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }
    public function get()
    {
        $usuario = $this->email;

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $usuario]);

        $userDTO = $stmt->fetch(PDO::FETCH_ASSOC);

        return $userDTO;
    }
    public function getName()
    {
        return $this->name;
    }
}
