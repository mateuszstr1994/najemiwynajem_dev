<?php

namespace App\Entity\Main;


use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\UserBundle\Entity\User;
use App\Entity\Main\MembersOfCompany;
/**
 * @ORM\Entity(repositoryClass="App\Repository\Main\PeopleRepository")
 */
class People extends BaseEntity
{   
     /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User", fetch="EXTRA_LAZY", inversedBy="people", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $user;
    
     /**
     * One Product has One Shipment.
     * OneToOne(targetEntity="MembersOfCompany", mappedBy="person")
     */
    protected $member_of_company;
    
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
    protected $date_of_birth;
    
    function getUser() {
        return $this->user;
    }
    
    function setUser(\App\Application\Sonata\UserBundle\Entity\User $user) {
        $this->user = $user;
    }

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
    
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }
    
    //public function __construct(User $user)
    //{
    //    parent::__construct($user);
    //    $this->setUser($user);
    //}
        
    public function setDateOfBirth(\DateTime $dateOfBirth = null)
    {
        $this->date_of_Birth = $dateOfBirth;
    } 
    
    public function __toString()
    {
        return $this->getName()." ".$this->getSurname();
    }
    
    /**
     * @return mixed
     */
    public function getMemberOfCompany()
    {
        return $this->memberOfCompany;
    }
    
    
    
}
