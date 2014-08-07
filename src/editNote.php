<?php

$params = array();
parse_str(file_get_contents('php://input'), $params);

if (!isset($params['title'])) {
	die('Define o título poow');
}

if (!isset($params['content'])) {
	die('Define o content poow');
}

include_once __DIR__ . '/createSlug.php';
$database = include __DIR__ . '/database.php';
$update = $database->prepare('UPDATE note SET title = :title, content = :content, slug = :slug WHERE slug = :key');

$nota = array(
	'title' => $params['title'],
	'content' => $params['content'],
	'slug' => createSlug($params['title'])
);

$update->execute(
	array(
		':title' => $nota['title'],
		':content' => $nota['content'],
		':slug' => $nota['slug'],
		':key' => $GLOBALS['noteSlug']
	)
);

header("Content-type: application/json");
echo json_encode($nota);