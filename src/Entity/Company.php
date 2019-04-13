<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Person;
use App\Entity\MemberOfCompany;

/**
 * @ORM\Entity
 * @ORM\Table(name="company")
 */
class Company extends AbstractBaseEntity
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="MemberOfCompany", fetch="EXTRA_LAZY", mappedBy="company",  cascade={"persist"})
     */
    private $member_of_company = [];

    public function __construct()
    {
        parent::__construct();
        $this->member_of_company = new ArrayCollection();
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
     * @return Collection|MemberOfCompany[]
     */
    public function getMemberOfCompany(): Collection
    {
        return $this->member_of_company;
    }

    public function addMemberOfCompany(MemberOfCompany $memberOfCompany): self
    {
        if (!$this->member_of_company->contains($memberOfCompany)) {
            $this->member_of_company[] = $memberOfCompany;
            $memberOfCompany->setCompany($this);
        }

        return $this;
    }

    public function removeMemberOfCompany(MemberOfCompany $memberOfCompany): self
    {
        if ($this->member_of_company->contains($memberOfCompany)) {
            $this->member_of_company->removeElement($memberOfCompany);
            // set the owning side to null (unless already changed)
            if ($memberOfCompany->getCompany() === $this) {
                $memberOfCompany->setCompany(null);
            }
        }

        return $this;
    }
}