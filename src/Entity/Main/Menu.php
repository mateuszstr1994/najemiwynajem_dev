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
    private $position; 
    
    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $block = '';
    
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
    
     /**
     * Add item
     *
     * @param \PTDBundle\Entity\MenuItem $item
     *
     * @return Menu
     */
    public function addItem(\PTDBundle\Entity\MenuItem $item)
    {

        if(!$item->getMenu()){
            $item->setMenu($this);
        }
        if($item->getMenu() == $this){
            $this->items[] = $item;
        }

        return $this;
    }

    public function addItems($item)
    {
        $item->setMenu($this);
        if($item->getParent() == null ){
            $this->items[] = $item;
        }
    }

    /**
     * Remove item
     *
     * @param \PTDBundle\Entity\MenuItem $item
     */
    public function removeItem(\PTDBundle\Entity\MenuItem $item)
    {
        if($item->getMenu() == $this){
            $item->setItemChildren([]);
            $this->items->removeElement($item);
        }
    }

    public function setItems($items)
    {
        if (count($items) > 0) {
            foreach ($items->toArray() as $item) {
                if(!$item->getMenu() || $item->getMenu() == null){
                    $item->setMenu($this);
                }
                if ($item->getMenu()->getId() == $this->getId()){
                    $this->addItem($item);
                }
            }
        }
        return $this;
    }
    
    public function __toString()
    {
        return (string) $this->name;
    }
    
    function getBlock() {
        return $this->block;
    }

    function setBlock($blockName) {
        $this->block = $blockName;
    }


    
}
