<?php
namespace IW\NoteManager\Notes\Model;

/* Havia faltado isto, a documentação do doctrine considera que as annotations
 * estão sendo mágicamente registradas, quando na verdade devemos importá-las com o comando `use`.
 *
 * Vejam como estão sendo utilizadas as anotações no docblox da classe.
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="note")
 */
class Note
{
    /**
     * @var int
     */
    protected $id; // Cadê o mapeamento da coluna?

    /**
     * @var string
     */
    protected $title; // Cadê o mapeamento da coluna?

    /**
     * @var string
     */
    protected $content; // Cadê o mapeamento da coluna?

    /**
     * @var string
     */
    protected $slug; // Cadê o mapeamento da coluna?

    /**
     * @var array
     */
    protected $arrayNote = array(); // Pra que precisamos deste atributo?

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
        $this->arrayNote['title'] = $this->title; // Pra que esta operação?
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        $this->arrayNote['content'] = $this->content; // Pra que esta operação?
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug) // Por que existe este método, a alteração do atributo poderia ser diretamente no setTile()?
    {
        $this->slug = $slug;
        $this->arrayNote['slug'] = $this->slug;
    }

    public function createSlug($title) // Por que este método é publico?
    {
        return $title;
    }

    public function toArray()
    {
        return $this->arrayNote; // Aqui deveria criar o array SOMENTE quando necessário, para não termos esse atributo que não faz sentido à classe
    }
} // NUNCA utilize a tag de fechamento do PHP caso o arquivo tenha APENAS código PHP
?>