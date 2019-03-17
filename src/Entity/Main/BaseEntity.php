<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Represents a Base Entity.
 */
class BaseEntity
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $createdAt;
    
    /**
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $updateAt;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $createdBy;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="updatedBy", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $updatedBy;
    
    
    public function __construct(User $user)
    {   
        $this->setCreatedAt($user);
        $this->setUpdateAt($user); 
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdateAt() {
        return $this->updateAt;
    }

    public function getCreatedBy() {
        return $this->createdBy;
    }

    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCreatedAt() {
        $this->createdAt =new \DateTime("now");
    }

    public function setUpdateAt() {
        // WILL be saved in the database
        $this->updateAt = new \DateTime("now");
    }
    
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }
    
}
