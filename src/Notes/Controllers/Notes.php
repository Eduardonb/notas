<?php

namespace IW\NoteManager\Notes\Controllers;

use Lcobucci\ActionMapper2\Routing\Annotation\Route;
use Lcobucci\ActionMapper2\Routing\Controller;

class Notes extends Controller
{
	/**
	 * @Route("/")
	 */
	public function listAll()
	{
		$this->response->setContentType('application/json');
		
		return json_encode(require_once __DIR__ . '/../../listNotes.php');
	}
}
