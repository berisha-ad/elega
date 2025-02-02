<?php

namespace Framework;

use App\Controllers\Controller;

class Router {
    protected $routes = [];

    public function registerRoute( string $method, string $uri, string $action ) : void {

        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' =>$controllerMethod
        ];
    }

    public function get( string $uri, string $controller ) : void {
        $this->registerRoute('GET', $uri, $controller);
    }
    public function post( string $uri, string $controller ) : void {
        $this->registerRoute('POST', $uri, $controller);
    }
    public function put( string $uri, string $controller ) : void {
        $this->registerRoute('PUT', $uri, $controller);
    }
    public function delete( string $uri, string $controller ) : void {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function route( string $uri, string $method ) : void {
        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                return;
            }
        }
        http_response_code(404);
        Controller::loadView("404");
        exit;
    }
}