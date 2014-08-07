<?php
$database = include __DIR__ . '/database.php';

$delete = $database->prepare('DELETE FROM note WHERE slug = :slug');
$delete->execute(array(':slug' => $GLOBALS['noteSlug']));

header($_SERVER["SERVER_PROTOCOL"] . " 204");
