<?php
namespace MiApp\Controllers;

use MiApp\Models\Post;

class PostController extends BaseController
{
    public function __construct() {}

    public function index() {
        if(isset($_SESSION) && array_key_exists('_token', $_SESSION)) {
            $data = [
                "title" => "MiApp | Posts",
                "page" => "posts",
                "posts" => $this->all()
            ];
            return $this->view("", $data);
        } else {
            header('Location: /notfound');
            exit;
        }
    }
    public function all() {
        $userpost = new Post($_SESSION['user_id']);
        $posts = $userpost->all();
        
        return $posts;
    }
}