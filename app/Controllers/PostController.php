<?php
namespace MiApp\Controllers;

use MiApp\Models\User;

class PostController extends BaseController
{
    public function __construct() {}

    public function index() {
        if(isset($_SESSION) && array_key_exists('_token', $_SESSION)) {
            $data = [
                "title" => "MiApp | Posts",
                "page" => "dashboard",
                "posts" => $this->all()
            ];
            return $this->view("", $data);
        } else {
            header('Location: /notfound');
            exit;
        }
    }
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