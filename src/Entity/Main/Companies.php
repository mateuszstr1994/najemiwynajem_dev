<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Main\People;

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
     * @ORM\OneToMany(targetEntity="People", fetch="EXTRA_LAZY", mappedBy="company",  cascade={"persist"})
     */
    private $people = [];
    
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
