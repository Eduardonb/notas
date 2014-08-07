<?php
require_once __DIR__ . '/../boot.php';

use Lcobucci\ActionMapper2\Config\ApplicationBuilder;

$app = ApplicationBuilder::build(
    __DIR__ . '/../config/routes.xml',
    require __DIR__ . '/../config/di-config.php'
);

$app->run();

/*


if ($resource == '/notas' && $method == 'POST') {
	include __DIR__ . '/../src/createNote.php';
	die();
}

$noteSlug = substr($resource, 6);

if ($method == 'PUT') {
	include __DIR__ . '/../src/editNote.php';
	die();
}

if ($method == 'DELETE') {
	include __DIR__ . '/../src/deleteNote.php';
	die();
}*/