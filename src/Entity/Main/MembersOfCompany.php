<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Main\People;
use App\Entity\Main\Companies;
/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\MembersOfCompanyRepository")
 */
class MembersOfCompany extends BaseEntity
{
    
    /**
     * @ORM\OneToOne(targetEntity="People", fetch="EXTRA_LAZY", inversedBy="memberOfCompany", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $person;
    
     /**
     * @ORM\ManyToOne(targetEntity="Companies", inversedBy="company",  cascade={"persist"})
     */
    private $company;
        
    function getPerson() {
        return $this->person;
    }

    function getCompany() {
        return $this->company;
    }

    function setPerson($person) {
        $this->person = $person;
    }

    function setCompany($company) {
        $this->company = $company;
    }

}
