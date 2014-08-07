<?php

namespace IW\NoteManager\Notes\Model;


/**
 * @Entity @Table(name="note")
 **/
class Note {

	/**
	 * @var int
	 */
	protected $id;
	/**
	 * @var string
	 */
	protected $title;
	/**
	 * @var string
	 */
	protected $content;
	
	/**
	 * @var string
	 */
	protected $slug;
	
	/**
	 * @var array
	 */
	protected $arrayNote = array();

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
		$this->arrayNote['title'] = $this->title;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
		$this->arrayNote['content'] = $this->content;
	}
	
	public function getSlug()
	{
		return $this->slug;
	}
	
	public function setSlug($slug)
	{
		$this->slug = $slug;
		$this->arrayNote['slug'] = $this->slug;
	}
	
	public function createSlug($title)
	{
		return $title;
	}
	
	public function toArray()
	{
		return $this->arrayNote;
	}
}
?>