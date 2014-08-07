<?php

namespace IW\NoteManager\Notes\Controllers;

use Lcobucci\ActionMapper2\Routing\Annotation\Route;
use Lcobucci\ActionMapper2\Routing\Controller;
use IW\NoteManager\Notes\Model\Note as NoteEntity;

class Notes extends Controller
{
	/**
	 * @Route("/", methods={"GET"})
	 */
	public function listAll()
	{
		$this->response->setContentType('application/json');

		return json_encode(require_once __DIR__ . '/../../../scripts/listNotes.php');
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

// 		$GLOBALS['title'] = $this->request->request->get('title');
// 		$GLOBALS['content'] = $this->request->request->get('content');

		//$note = require_once __DIR__ . '/../../../scripts/createNote.php';

		$entityManager = $this->get('orm.em');

		$note = new NoteEntity();
		$note->setTitle($this->request->request->get('title'));
		$note->setContent($this->request->request->get('content'));
		$note->setSlug($note->createSlug($this->request->request->get('title')));

		$entityManager->persist($note);
		$entityManager->flush();

		$this->response->setStatusCode(201);
		$this->response->setContentType('application/json');
		$this->response->headers->set('Location', $this->request->getUriForPath('/nota/' . $note->getSlug()));

		return json_encode($note->toArray());
	}
}
