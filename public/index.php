<?php
$method = $_SERVER['REQUEST_METHOD'];
$resource = str_replace('/workspace/notas/public', '', $_SERVER['REQUEST_URI']);

if ($resource == '/notas' && $method == 'GET') {
	include __DIR__ . '/../src/listNotes.php';
	die();
}

if ($resource == '/notas' && $method == 'POST') {
	include __DIR__ . '/../src/createNote.php';
	die();
}

if ($method == 'GET') {
	die('Visualisa UMA nota');
}

if ($method == 'PUT') {
	die('Altera UMA nota');
}

if ($method == 'DELETE') {
	die('Remove UMA nota');
}