<?php
namespace IW\NoteManager\Notes\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="note")
 */
class Note
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * 
	 * @var int
	 */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * 
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     * 
     * @ORM\Column(type="string")
     */
    private $slug;

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
        $this->slug = $this->createSlug($title);
    }
    
    private function createSlug($title)
    {
    	return strtolower(str_replace(' ', '-', $title));
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function toArray()
    {
        return array(
        	'title' => $this->title,
        	'slug' => $this->title,
        	'content' => $this->content
        );
    }
}
