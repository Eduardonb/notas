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

		return json_encode(require_once __DIR__ . '/../../../scripts/viewNote.php');
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
		
		$note = $this->getNote($slug);
		$note->setTitle($this->request->request->get('title'));
		$note->setContent($this->request->request->get('content'));
		
		$em = $this->get('orm.em');
		$em->persist($note);
		$em->flush();

		return json_encode($note->toArray());
	}

	/**
	 * @Route("/", methods={"DELETE"})
	 */
	public function delete($slug)
	{
		$note = $this->getNote($slug);
		
		$em = $this->get('orm.em');
		$em->remove($note);
		$em->flush();

		$this->response->setStatusCode(204);
	}
	
	/**
	 * @param string $slug
	 * 
	 * @return \IW\NoteManager\Notes\Model\Note
	 */
	private function getNote($slug)
	{
		return $this->get('orm.em')->getRepository('IW\NoteManager\Notes\Model\Note')->findOneBySlug($slug);
	}
}
