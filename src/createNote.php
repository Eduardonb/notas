<?php
if (!isset($_POST['title'])) {
	die('Define o título poow');
}

if (!isset($_POST['content'])) {
	die('Define o content poow');
}

$database = include __DIR__ . '/database.php';
$insert = $database->prepare('INSERT INTO note VALUES (null, :title, :content, :slug)');

function createSlug($title)
{
	return $title;
}

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

echo json_encode($nota);