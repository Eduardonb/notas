<?php

if (!isset($_GET['title'])) {
	die('Define o título poow');
}

if (!isset($_GET['content'])) {
	die('Define o content poow');
}

$database = include __DIR__ . '/database.php';
$update = $database->prepare('UPDATE note SET title = :title, content = :content, slug = :novoslug WHERE slug = :slug');

function createSlug($title)
{
	return $title;
}

$nota = array(
	'title' => $_GET['title'],
	'content' => $_GET['content'],
	'slug' => $_GET['slug'],
	'novoslug' => createSlug($_GET['title'])
);

$update->execute(
	array(
		':title' => $nota['title'],
		':content' => $nota['content'],
		':slug' => $nota['slug'],
		':novoslug' => $nota['novoslug']
	)
);

echo json_encode($nota);