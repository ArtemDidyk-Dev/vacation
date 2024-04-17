<?php

declare(strict_types=1);

namespace Framework;

class Route
{
    private static array $routes = [];

    public static function set(string $url, array $dataAction, string $method): void
    {
        self::$routes[] = [
            'url' => $url,
            'controller' => $dataAction['controller'],
            'method' => $dataAction['method'],
            'REQUEST_METHOD' => $method,
        ];

        self::start();
    }

    public static function start(): void
    {
        foreach (self::$routes as $route) {
            $controller = $route['controller'];
            $method = $route['method'];
            if ((empty($_SERVER['REQUEST_URI']) && $url = '/')) {
                $controller->{$method}();
                die();
            }
        }
    }
}
