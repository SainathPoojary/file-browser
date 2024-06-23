<?php
require __DIR__ . '/env.php';
$request = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';

if (!isset($_COOKIE['token']) || !password_verify(getenv('PASSWORD'), $_COOKIE['token'])) {
    global $request;
    $request = '/login';
}

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'browser.php';
        break;

    case '/login':
        require __DIR__ . $viewDir . 'login.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
