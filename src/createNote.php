<?php
include_once __DIR__ . '/createSlug.php';
$database = include __DIR__ . '/database.php';
$insert = $database->prepare('INSERT INTO note VALUES (null, :title, :content, :slug)');

$nota = array(
	'title' => $GLOBALS['title'],
	'content' => $GLOBALS['content'],
	'slug' => createSlug($GLOBALS['title'])
);

$insert->execute(
	array(
		':title' => $nota['title'],
		':content' => $nota['content'],
		':slug' => $nota['slug']
	)
);

return $nota;