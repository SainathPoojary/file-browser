<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$remember = isset($_POST['remember-me']) ? $_POST['remember-me'] : '';

if (empty($username) || empty($password)) {
    header('Location: /?error=empty');
    exit();
}

if ($username === 'admin' && $password === 'admin') {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if ($remember) {
        setcookie('token', $hashedPassword, time() + 3600, '/');
    } else {
        setcookie('token', $hashedPassword, 0, '/');
    }
}
header('Location: /');
exit();
