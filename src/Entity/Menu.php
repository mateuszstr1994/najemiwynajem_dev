<?php

namespace App\Entity;

use App\Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="menu")
 */
class Menu extends AbstractBaseEntity
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
    private $position; 
    
    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alias = '';
    
     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
     
     /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $class = '';
    
    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $id_attribute;

    /**
     *
     * @ORM\Column(type="boolean")
     */
    private $status;
    
    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="menu", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $items = [];

    public function __construct()
    {
        parent::__construct();
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

    function getClass() {
        return $this->class;
    }

    function getStatus() {
        return $this->status;
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

    function setClass($class) {
        $this->class = $class;
    }
    
    function getIdAttribute() {
        return $this->id_attribute;
    }

    function setIdAttribute($idAttribute) {
        $this->id_attribute = $idAttribute;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    function getBlock() {
        return $this->block;
    }

    function setBlock($block) {
        $this->block = $block;
    }
    
    function getAlias() {
        return $this->alias;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }
    
    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @return Collection|MenuItem[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(MenuItem $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setMenu($this);
        }

        return $this;
    }

    public function removeItem(MenuItem $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            // set the owning side to null (unless already changed)
            if ($item->getMenu() === $this) {
                $item->setMenu(null);
            }
        }

        return $this;
    }
    
}
