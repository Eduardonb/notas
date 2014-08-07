<?php
include_once __DIR__ . '/createSlug.php';

$database = include __DIR__ . '/database.php';
$update = $database->prepare('UPDATE note SET title = :title, content = :content, slug = :slug WHERE slug = :key');

$nota = array(
	'title' => $GLOBALS['title'],
	'content' => $GLOBALS['content'],
	'slug' => createSlug($GLOBALS['title'])
);

$update->execute(
	array(
		':title' => $nota['title'],
		':content' => $nota['content'],
		':slug' => $nota['slug'],
		':key' => $GLOBALS['slug']
	)
);

return $nota;