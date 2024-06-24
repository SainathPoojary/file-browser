<?php
$dir =  scandir(getenv('ROOT_DIR'));
$dir = array_diff($dir, array('..', '.'));
$dir = array_map(fn ($item) => $item, $dir);
?>

<section class="flex bg-neutral-800 min-h-screen">
    <?php require_once PARTIALS_DIR . 'sidebar.php'; ?>
    <?php require_once PARTIALS_DIR . 'table.php'; ?>
</section>