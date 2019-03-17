<?php

namespace App\Entity\Main;

use App\Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\MenuRepository")
 */
class Menu extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $position; //use in MenuBlock 
    
     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alias = '';
    
     /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $class = '';

    /**
     *
     * @ORM\Column(type="boolean")
     */
    private $status;
    
     /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="menu", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"position": "ASC"})
     */
    protected $items = [];

    function __construct()
    {
        $this->items = new ArrayCollection();
    }
    
    function getName() {
        return $this->name;
    }

    function getTitle() {
        return $this->title;
    }

    function getPosition() {
        return $this->position;
    }

    function getDescription() {
        return $this->description;
    }

    function getAlias() {
        return $this->alias;
    }

    function getClass() {
        return $this->class;
    }

    function getStatus() {
        return $this->status;
    }

    function getItems() {
        return $this->items;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setClass($class) {
        $this->class = $class;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setItems($items) {
        $this->items = $items;
    }
}
