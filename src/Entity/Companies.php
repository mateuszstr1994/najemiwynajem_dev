<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\People;
use App\Entity\MembersOfCompany;

/**
 * @ORM\Entity
 * @ORM\Table(name="companies")
 */
class Companies extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="MembersOfCompany", fetch="EXTRA_LAZY", mappedBy="company",  cascade={"persist"})
     */
    private $members_of_company = [];

    public function __construct()
    {
        parent::__construct();
        $this->members_of_company = new ArrayCollection();
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

    /**
     * @return Collection|MembersOfCompany[]
     */
    public function getMembersOfCompany(): Collection
    {
        return $this->members_of_company;
    }

    public function addMembersOfCompany(MembersOfCompany $membersOfCompany): self
    {
        if (!$this->members_of_company->contains($membersOfCompany)) {
            $this->members_of_company[] = $membersOfCompany;
            $membersOfCompany->setCompany($this);
        }

        return $this;
    }

    public function removeMembersOfCompany(MembersOfCompany $membersOfCompany): self
    {
        if ($this->members_of_company->contains($membersOfCompany)) {
            $this->members_of_company->removeElement($membersOfCompany);
            // set the owning side to null (unless already changed)
            if ($membersOfCompany->getCompany() === $this) {
                $membersOfCompany->setCompany(null);
            }
        }

        return $this;
    }
}