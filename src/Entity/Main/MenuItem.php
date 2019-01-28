<?php

namespace App\Entity\Main;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
    private $alias = '';

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
     *
     * @ORM\Column(type="integer")
     */
    private $columns;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $col;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="items")
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity="MenuItem", inversedBy="itemChildren", cascade={"persist"})
     * @ORM\JoinColumn(name="parent", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="parent", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="parent", referencedColumnName="id")
     *
     */
    protected $itemChildren;

    /**
     *
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(name="displayedFor", type="string", columnDefinition="enum('all', 'logged in', 'not logged in', 'UserPrivate', 'UserCompany')")
     */
    private $displayedFor = 'all';

    public function __construct()
    {
        $this->itemChildren = new ArrayCollection();
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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(?string $alias): self
    {
        $this->alias = $alias;

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

    public function setDescription(?string $description): self
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

    public function getColumns(): ?int
    {
        return $this->columns;
    }

    public function setColumns(int $columns): self
    {
        $this->columns = $columns;

        return $this;
    }

    public function getCol(): ?int
    {
        return $this->col;
    }

    public function setCol(int $col): self
    {
        $this->col = $col;

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
        return $this->displayedFor;
    }

    public function setDisplayedFor(string $displayedFor): self
    {
        $this->displayedFor = $displayedFor;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
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

    /**
     * @return Collection|MenuItem[]
     */
    public function getItemChildren(): Collection
    {
        return $this->itemChildren;
    }

    public function addItemChild(MenuItem $itemChild): self
    {
        if (!$this->itemChildren->contains($itemChild)) {
            $this->itemChildren[] = $itemChild;
            $itemChild->setParent($this);
        }

        return $this;
    }

    public function removeItemChild(MenuItem $itemChild): self
    {
        if ($this->itemChildren->contains($itemChild)) {
            $this->itemChildren->removeElement($itemChild);
            // set the owning side to null (unless already changed)
            if ($itemChild->getParent() === $this) {
                $itemChild->setParent(null);
            }
        }

        return $this;
    }
    
   public function __toString() {
        return (string) $this->name;
    }
}
