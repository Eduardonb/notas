<?php

$database = include __DIR__ . '/database.php';
$delete = $database->prepare('DELETE FROM note WHERE slug = :slug');


$nota = array(
	'slug' => $_GET['slug']
);

$delete->execute(
	array(
		':slug' => $nota['slug']
	)
);

echo json_encode($nota);