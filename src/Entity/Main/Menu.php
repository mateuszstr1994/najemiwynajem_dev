<?php

namespace App\Entity\Main;

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
