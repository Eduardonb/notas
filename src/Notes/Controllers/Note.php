<?php

namespace IW\NoteManager\Notes\Controllers;

use Lcobucci\ActionMapper2\Routing\Annotation\Route;
use Lcobucci\ActionMapper2\Routing\Controller;

class Note extends Controller
{
	/**
	 * @Route("/", methods={"GET"})
	 */
	public function show($slug)
	{
		$this->response->setContentType('application/json');
		$GLOBALS['slug'] = $slug;
		
		return json_encode(require_once __DIR__ . '/../../viewNote.php');
	}
}
