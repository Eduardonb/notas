<?php
$database = include __DIR__ . '/database.php';

$delete = $database->prepare('DELETE FROM note WHERE slug = :slug');
$delete->execute(array(':slug' => $GLOBALS['slug']));
