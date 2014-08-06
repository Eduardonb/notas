<?php
$database = include __DIR__ . '/database.php';

$list = $database->prepare('SELECT * FROM note');
$list->execute();

echo json_encode($list->fetchAll(PDO::FETCH_ASSOC));