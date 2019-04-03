<?php

namespace App\Entity;

use App\Application\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="members_of_company")
 */
class MembersOfCompany extends BaseEntity
{
    /**
     * @ORM\OneToOne(targetEntity="People", fetch="EXTRA_LAZY", inversedBy="member_of_company", cascade={"persist"})
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







