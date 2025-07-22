<?php

declare(strict_types=1);

// Autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Initialisation du routeur
$router = new class {
    private array $routes = [];

    public function get(string $path, callable|string $callback): void {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, callable|string $callback): void {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch(string $url): void {
        $method = $_SERVER['REQUEST_METHOD'];
        $callback = $this->routes[$method][$url] ?? null;

        if ($callback) {
            if (is_string($callback) && class_exists($callback)) {
                (new $callback())(); // Controller::__invoke()
            } elseif (is_callable($callback)) {
                call_user_func($callback);
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
};

// Charger tous les fichiers de routes dans /routes/
foreach (glob(__DIR__ . '/../routes/*.php') as $routeFile) {
    require_once $routeFile;
}

// Récupérer l'URL actuelle, sans query string
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Lancer le dispatch
$router->dispatch($url);
