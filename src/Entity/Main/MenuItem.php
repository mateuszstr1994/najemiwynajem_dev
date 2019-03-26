<?php

namespace App\Entity\Main;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Menu;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\MenuItemRepository")
 */
class MenuItem extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug = '';

    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $position;
    
     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $class;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="items")
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity="MenuItem", inversedBy="item_children", cascade={"persist"})
     * @ORM\JoinColumn(name="parent", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="parent", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="parent", referencedColumnName="id")
     *
     */
    protected $item_children;

    /**
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\Column( type="string", columnDefinition="enum('all', 'logged in', 'not logged in', 'UserPrivate', 'UserCompany')")
     */
    private $displayed_for = 'all';

    public function __construct()
    {
        $this->item_children = new ArrayCollection();
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        if($slug){
            $this->slug = $this->slugify($slug);
        } else {
            $this->slug = $this->slugify($this->name);
        }

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

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

    public function getDisplayedFor(): ?string
    {
        return $this->displayed_for;
    }

    public function setDisplayedFor(string $displayedFor): self
    {
        $this->displayed_for = $displayedFor;

        return $this;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function setMenu($menu): self
    {
        $this->menu = $menu;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
    
    public function getItemChildren() {
        return $this->item_children;
    }
    
    public function setItemChildren($itemChildren) {
        $this->item_children = $itemChildren;
    }
    
    public function removeItem(MenuItem $item)
    {
        $this->itemChildren->removeElement($item);
    }
    
    public function __toString() 
    {
        return (string) $this->name;
    }
    
    public function slugify($string)
    {
        return preg_replace(
            '/[^a-z0-9]/',
            '-',
            strtolower(trim(strip_tags($string)))
        );
    }
    
}
