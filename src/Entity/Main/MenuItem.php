<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\MenuItemRepository")
 */
class MenuItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

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
    
    public function getId(): ?int
    {
        return $this->id;
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
}
