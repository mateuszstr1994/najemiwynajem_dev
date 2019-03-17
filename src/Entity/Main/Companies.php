<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Main\People;
use App\Entity\Main\MembersOfCompany;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\CompaniesRepository")
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
