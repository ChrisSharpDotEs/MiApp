<?php
namespace MiApp\Controllers;

use MiApp\Models\User;

class PostController 
{
    public function __construct() {}

    public function all() {
        $posts = [
            (object) [
                "img" => "./public/img/benijo.webp",
                "title" => "Post de ejemplo 1",
                "description" => "Breve descripción de ejemplo"
            ],
            (object) [
                "img" => "./public/img/benijo.webp",
                "title" => "Post de ejemplo 2",
                "description" => "Breve descripción de ejemplo"
            ],
            (object) [
                "img" => "./public/img/benijo.webp",
                "title" => "Post de ejemplo 3",
                "description" => "Breve descripción de ejemplo"
            ]
        ];
        return $posts;
    }
}