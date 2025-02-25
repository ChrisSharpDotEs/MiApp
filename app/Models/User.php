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
    public string $token;

    public function __construct()
    {
        parent::__construct();
    }
    public function get($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $this->email]);

        $userDTO = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->close();

        return $userDTO;
    }
    public function getName()
    {
        return $this->name;
    }
}
