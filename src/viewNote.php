<?php
$database = include __DIR__ . '/database.php';

$list = $database->prepare("SELECT * FROM note WHERE slug = ?");
$list->execute(array($GLOBALS['slug']));

return $list->fetch(PDO::FETCH_ASSOC);