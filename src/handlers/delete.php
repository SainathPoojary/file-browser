<?php
if (isset($_GET['file'])) {
    $filepath = urldecode($_GET['file']);
    if (file_exists($filepath)) {
        unlink($filepath);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "File does not exist.";
    }
} else {
    echo "No file specified.";
}
