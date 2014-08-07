<?php
if (!isset($_POST['title'])) {
	die('Define o título poow');
}

if (!isset($_POST['content'])) {
	die('Define o content poow');
}

include_once __DIR__ . '/createSlug.php';
$database = include __DIR__ . '/database.php';
$insert = $database->prepare('INSERT INTO note VALUES (null, :title, :content, :slug)');

$nota = array(
	'title' => $_POST['title'],
	'content' => $_POST['content'],
	'slug' => createSlug($_POST['title'])
);

$insert->execute(
	array(
		':title' => $nota['title'],
		':content' => $nota['content'],
		':slug' => $nota['slug']
	)
);

header($_SERVER["SERVER_PROTOCOL"] . " 201");
header("Location: " . $GLOBALS['baseUri'] . '/nota/' . $nota['slug']);
header("Content-type: application/json");
echo json_encode($nota);