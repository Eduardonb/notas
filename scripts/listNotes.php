<?php
$database = include __DIR__ . '/database.php';

$list = $database->prepare('SELECT * FROM note');
$list->execute();

return $list->fetchAll(PDO::FETCH_ASSOC);