<?php

require_once __DIR__ . '/../vendor/autoload.php'; //composer

use App\Controller\Home\HomeController;
use App\Controller\Collection\CollectionController;
use App\Controller\Authentification\InscriptionController;
use App\Controller\Authentification\ConnexionController;

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
                (new $callback())(); // invoke
            } elseif (is_callable($callback)) {
                call_user_func($callback);
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
};

//Page d'accueil
$router->get('/', HomeController::class);

//Collection
$router->get('/collection', CollectionController::class);

//Connexion
$router->get('/inscription', RegisterController::class);
$router->get('/connexion', ConnexionController::class);
//Déconnexion
$router->post('/logout', LogoutController::class);

//Joueur
$router->get('/joueur', PlayerController::class);

//Compte
$router->get('/compte', AccountController::class);

// URL rewriting
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($url);