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
	
	/**
	 * @Route("/", methods={"PUT"})
	 */
	public function update($slug)
	{
		if (!$this->request->request->has('title')) {
			throw new \InvalidArgumentException('O título deve ser definido');
		}
		
		if (!$this->request->request->has('content')) {
			throw new \InvalidArgumentException('O conteúdo deve ser definido');
		}
		
		$this->response->setContentType('application/json');
		
		$GLOBALS['slug'] = $slug;
		$GLOBALS['title'] = $this->request->request->get('title');
		$GLOBALS['content'] = $this->request->request->get('content');
		
		return json_encode(require_once __DIR__ . '/../../editNote.php');
	}
	
	/**
	 * @Route("/", methods={"DELETE"})
	 */
	public function delete($slug)
	{
		$GLOBALS['slug'] = $slug;
		require_once __DIR__ . '/../../deleteNote.php';
		
		$this->response->setStatusCode(204);
	}
}
