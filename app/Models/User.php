<?php

namespace MiApp\Models;

use Exception;
use MiApp\Models\DBConnection;
use PDO;
use PDOException;

class User extends DBConnection
{
    private int $id;
    private string $name;
    private string $lastname;
    private string $password;
    private string $email;
    private string $token;

    public function __construct()
    {
        parent::__construct();
    }
    public function get($email)
    {
        try {
            $this->email = $email;
    
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $this->email]);
    
            $userDTO = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($userDTO) {
              $this->close();
              return $userDTO;
            } else {
                $this->close();
                return null;
            }
    
        } catch (PDOException $e) {
            $this->close();
            return null;
        } catch (Exception $e) {
            $this->close();
            return null;
        }
    }
    public function create($name, $email, $password) {
        try {
            $salt = "rHtvTniO";
            $securedPass = hash('sha256', $salt . $password);

            var_dump($this->conn);
            $sql = "INSERT INTO users ('name', 'email', 'password') VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':name' => $name,
                ':password' => $securedPass
            ]);
    
            $userDTO = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($userDTO) {
              return $userDTO;
            } else {
                return null;
            }
    
        } catch (PDOException $e) {
            return null;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->close();
        }
    }
    public function exists($email) {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
    
            $userDTO = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($userDTO) {
              return $userDTO;
            } else {
                return null;
            }
    
        } catch (PDOException $e) {
            $this->close();
            return null;
        } catch (Exception $e) {
            $this->close();
            return null;
        }
    }
    public static function getUser($userDTO)
    {
        $user = new User();
        $user->id = $userDTO['id'] ?? '';
        $user->name = $userDTO['name'] ?? '';
        $user->email = $userDTO['email'] ?? '';
        $user->token = $userDTO['token'] ?? '';
        return $user;
    }
    public function setToken($token)
    {
        $sql = "UPDATE users SET token = :token WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id', $this->id);

        try {
            $result = $stmt->execute();
            $this->close();
            return $result;

        } catch (PDOException $e) {
            error_log("Error en setToken: " . $e->getMessage());
            return false;
        }
    }
}
