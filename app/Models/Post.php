<?php

namespace MiApp\Models;

use ErrorException;
use Exception;
use MiApp\Models\DBConnection;
use MiApp\Models\User;
use PDO;

class Post extends DBConnection
{
    private int $id;
    private int $id_user;
    private string $title;
    private string $description;
    private string $img_url;
    private string $created_at;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }
    public function all()
    {
        $sql = "SELECT title, description, img_url, created_at FROM posts WHERE id_user = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $this->id]);
        
        $postDTO = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->close();

        return $postDTO;
    }
}