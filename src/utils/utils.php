<?php

declare(strict_types=1);

function get_full_path(string $path): string
{
    $path = urldecode($path);
    $path = trim($path, " \t\n\r\0\x0B/");
    if (empty($path) || $path === "/" || $path === "files") {
        return ROOT_DIR;
    }
    $path = str_replace("files/", "", $path);
    return ROOT_DIR . "/" . $path;
}

function get_relative_path(string $path): string
{
    if (empty($path) || $path === "/") return "/files";
    $path = str_replace(ROOT_DIR, "", $path);
    $path = trim($path, " \t\n\r\0\x0B/");
    return "/files/" . $path;
}
