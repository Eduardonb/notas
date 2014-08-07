<?php

namespace IW\NoteManager\Notes\Controllers;

use Lcobucci\ActionMapper2\Routing\Annotation\Route;
use Lcobucci\ActionMapper2\Routing\Controller;

class Notes extends Controller
{
	/**
	 * @Route("/", methods={"GET"})
	 */
	public function listAll()
	{
		$this->response->setContentType('application/json');
		
		return json_encode(require_once __DIR__ . '/../../listNotes.php');
	}

	/**
	 * @Route("/", methods={"POST"})
	 */
	public function create()
	{
		if (!$this->request->request->has('title')) {
			throw new \InvalidArgumentException('O título deve ser definido');
		}
		
		if (!$this->request->request->has('content')) {
			throw new \InvalidArgumentException('O conteúdo deve ser definido');
		}
		
		$GLOBALS['title'] = $this->request->request->get('title');
		$GLOBALS['content'] = $this->request->request->get('content');
		
		$note = require_once __DIR__ . '/../../createNote.php';
		
		$this->response->setStatusCode(201);
		$this->response->setContentType('application/json');
		$this->response->headers->set('Location', $this->request->getUriForPath('/nota/' . $note['slug']));
		
		return json_encode($note);		
	}
}