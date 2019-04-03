<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Gedmo\Tree(type="closure")
 * @Gedmo\TreeClosure(class="App\Entity\MenuItemClosure")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\ClosureTreeRepository")
 * @ORM\Table(name="menu_item")
 */
class MenuItem
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="items")
     */
    private $menu;
    
    /**
     *
     * @ORM\Column(type="boolean")
     */
    private $status;
    
    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;
    
    /**
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @ORM\Column(name="title_attribute", type="string", nullable=true)
     */
    private $title_attribute;
    
    /**
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;
    
    /**
     * @ORM\Column(name="class_attribute", type="string", nullable=true)
     */
    private $class_attribute;
    
    /**
     * @ORM\Column(name="id_attribute", type="string", nullable=true)
     */
    private $id_attribute;
    
    /**
     * @ORM\Column(name="icon", type="string", nullable=true)
     */
    private $icon;
    
        /**
     * This parameter is optional for the closure strategy
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     * @Gedmo\TreeLevel
     */
    private $level;

    /**
     * @Gedmo\TreeParent
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\ManyToOne(targetEntity="MenuItem", inversedBy="children")
     */
    private $parent;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $position;
    
    public function getId()
    {
        return $this->id;
    }

    public function setParent(MenuItem $parent = null)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }
    
    public function getMenu() {
        return $this->menu;
    }
    
    public function setMenu($menu) {
        $this->menu = $menu;
    }
    
    public function __toString()
    {
        return (string) $this->name;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
    
    public function getPosition() {
        return $this->position;
    }
    
    public function setPosition($position) {
        $this->position = $position;
    }

    public function getClassAttribute(): ?string
    {
        return $this->class_attribute;
    }

    public function setClassAttribute(string $class_attribute): self
    {
        $this->class_attribute = $class_attribute;

        return $this;
    }

    public function getIdAttribute(): ?string
    {
        return $this->id_attribute;
    }

    public function setIdAttribute(string $id_attribute): self
    {
        $this->id_attribute = $id_attribute;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
    
    public function slugify(string $slug)
    {
        return preg_replace(
            '/[^a-z0-9]/',
            '-',
            strtolower(trim(strip_tags($slug)))
        );
    }
    
    public function setSlug($slug) {
        if($slug){
            $this->slug = $this->slugify($slug);
        } else {
            $this->slug = $this->slugify($this->name);
        }
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTitleAttribute(): ?string
    {
        return $this->title_attribute;
    }

    public function setTitleAttribute(?string $title_attribute): self
    {
        $this->title_attribute = $title_attribute;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

}