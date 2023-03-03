<?php

namespace App\Core;

class Render
{
    public static function view($view, $response = null)
    {
        $layoutContent = self::layoutContent();
        $viewContent = self::renderOnlyView($view, $response);
        echo str_replace("{{content}}", $viewContent, $layoutContent);
    }

    protected static function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/resources/views/layouts/main.php";
        return ob_get_clean();
    }

    protected static function renderOnlyView($view, $response = null)
    {

        if ($response) extract($response);

        ob_start();
        include_once Application::$ROOT_DIR . "/resources/views/$view.php";
        $_SESSION['errors'] = [];
        return ob_get_clean();
    }

    
}
