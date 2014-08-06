<?php
$database = include __DIR__ . '/database.php';

$list = $database->prepare("SELECT * FROM note WHERE slug = '". $_GET['slug'] ."'");
$list->execute();

echo json_encode($list->fetch(PDO::FETCH_ASSOC));