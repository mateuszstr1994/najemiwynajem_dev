<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\PeopleRepository")
 */
class People extends BaseEntity
{
     /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User", fetch="EXTRA_LAZY", inversedBy="people")
     */
    private $user;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $surname;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Main\Country", inversedBy="people")
     */
    protected $country;
            
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $dateOfBirth;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getSurname(): ?string
    {
        return $this->surname;
    }
    
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    } 
}
