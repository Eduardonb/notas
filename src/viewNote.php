<?php
$database = include __DIR__ . '/database.php';

$list = $database->prepare("SELECT * FROM note WHERE slug = ?");
$list->execute(array($GLOBALS['noteSlug']));

header("Content-type: application/json");
echo json_encode($list->fetch(PDO::FETCH_ASSOC));