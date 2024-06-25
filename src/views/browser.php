<?php
define('ROOT_DIR', getenv('ROOT_DIR'));
require_once './src/utils/utils.php';
$uri = $_SERVER['REQUEST_URI'];
$full_path = get_full_path($uri);

if (file_exists($full_path) && is_dir($full_path)) {
    global $files;
    $files = scandir($full_path);
    $files = array_diff($files, ['.', '..']);
    $files = array_filter($files, fn ($file) => str_starts_with($file, '.') === false);
    $files = array_values($files);
} else {
    header("Location: /files");
    exit();
}

$files = array_map(fn ($file) => [
    'name' => $file,
    'full_path' => $full_path . '/' . $file,
    'relative_path' => get_relative_path($full_path . '/' . $file),
], $files);

?>

<section class="flex bg-neutral-800 min-h-screen">
    <?php require_once PARTIALS_DIR . 'sidebar.php'; ?>
    <?php require_once PARTIALS_DIR . 'table.php'; ?>
</section>