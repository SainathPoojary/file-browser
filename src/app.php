<?php
require __DIR__ . '/env.php';
$request = $_SERVER['REQUEST_URI'];
define('VIEW_DIR', '/views/');
define('HANDLER_DIR', '/handlers/');
define('PARTIALS_DIR', __DIR__ . '/partials/');

$isAuth = isset($_COOKIE['token']) && password_verify(getenv('PASSWORD'), $_COOKIE['token']);

if (!$isAuth && $request !== '/login') {
    header('Location: /login');
    exit();
}

match (true) {
    $request === '/' => header('Location: /files'), // Redirect to /files if the request is /
    $request === '/login' => require __DIR__ . VIEW_DIR . 'login.php',
    str_starts_with($request, "/files") => require __DIR__ . VIEW_DIR . 'browser.php',
    default => require __DIR__ . VIEW_DIR . '404.php'
};
