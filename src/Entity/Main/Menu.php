<?php

namespace App\Entity\Main;

use App\Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\MenuRepository")
 */
class Menu
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
    private $name = 'Default Name';
    
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
     * @ORM\Column(type="integer")
     */
    private $position;
    
    /**
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateDate;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $updatedBy;

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
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="Country",
     * )
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    
    }
    

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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(?string $alias): self
    {
        $this->alias = $alias;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->createDate;
    }

    public function setCreateDate(?\DateTimeInterface $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->updateDate;
    }

    public function setUpdateDate(?\DateTimeInterface $updateDate): self
    {
        $this->updateDate = $updateDate;

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

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdatedBy(): ?User
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?User $updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
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

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }
    
     
   public function __toString() {
        return (string) $this->name;
    }
}
