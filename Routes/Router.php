<?php

namespace MiApp\Routes;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            "/" => [
                "controller" => "WebController",
                "GET" => "index"
            ],
            "/login" => [
                "controller" => "AuthController",
                "GET" => "index",
                "POST" => "authorize"
            ],
            "/logout" => [
                "controller" => "AuthController",
                "POST" => "logout"
            ],
            "/register" => [
                "controller" => "RegisterController",
                "GET" => "index",
                "POST" => "store"
            ],
            "/posts" => [
                "controller" => "PostController",
                "GET" => "index"
            ],
            "/clausules" => [
                "controller" => "WebController",
                "GET" => "clausules"
            ],
            "/politica-de-cookies" => [
                "controller" => "WebController",
                "GET" => "policy"
            ]
        ];
    }

    public function matchRoute($request, $method)
    {
        if (array_key_exists($request, $this->routes)) {
            $controller = $this->routes[$request]['controller'];
            $action = $this->routes[$request][$method];
            return [$controller, $action];
        }
        return ["WebController", "notfound"];
    }
}
