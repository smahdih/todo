<?php

namespace App\Core;

class Router
{
    public Request $request;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            return "Not Found";
        }
        if (is_string($callback)) {
            return Render::view($callback);
        }

        if(is_array($callback)) {
            return call_user_func([new $callback[0], $callback[1]], $this->request);
        }

        return $callback();
    }

}
