<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country extends AbstractBaseEntity
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $iso2;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $iso3;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $code;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name_pl;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name_en;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $continent;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $region;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\People", mappedBy="country")
     */
    protected $people;
    
    public function __construct()
    {
        $this->people = new ArrayCollection();
    }
    
    /**
     * @return Collection|Product[]
     */
    public function getPeople(): Collection
    {
        return $this->getPeople;
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

    public function getIso2(): ?string
    {
        return $this->iso2;
    }

    public function setIso2(string $iso2): self
    {
        $this->iso2 = $iso2;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(string $iso3): self
    {
        $this->iso3 = $iso3;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNamePl(): ?string
    {
        return $this->name_pl;
    }

    public function setNamePl(string $name_pl): self
    {
        $this->name_pl = $name_pl;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): self
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(?string $continent): self
    {
        $this->continent = $continent;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }
    
    public function __toString() {
        return (string) $this->name;
    }

    public function addPerson(People $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people[] = $person;
            $person->setCountry($this);
        }

        return $this;
    }

    public function removePerson(People $person): self
    {
        if ($this->people->contains($person)) {
            $this->people->removeElement($person);
            // set the owning side to null (unless already changed)
            if ($person->getCountry() === $this) {
                $person->setCountry(null);
            }
        }

        return $this;
    }
}
