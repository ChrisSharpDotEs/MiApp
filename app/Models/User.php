<?php

namespace MiApp\Models;

use ErrorException;
use Exception;
use MiApp\Models\DBConnection;

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
        $password = $this->password;
        $query = "SELECT * FROM users WHERE email = '$usuario' AND password = '$password'";

        $result = $this->query($query);

        return $result;
    }
    public function getName()
    {
        return $this->name;
    }
}
