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
    protected $created_at;
    
    /**
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $update_at;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $created_by;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="updated_by", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $updated_by;
    
    
    public function __construct()
    {   
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdateAt() {
        return $this->update_at;
    }

    public function getCreatedBy() {
        return $this->created_by;
    }

    public function getUpdatedBy() {
        return $this->updated_by;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCreatedAt() {
        $this->created_at =new \DateTime("now");
    }

    public function setUpdateAt() {
        // WILL be saved in the database
        $this->update_at = new \DateTime("now");
    }
    
    public function setCreatedBy($createdBy) {
        $this->created_by = $createdBy;
    }

    public function setUpdatedBy($updatedBy) {
        $this->updated_by = $updatedBy;
    }
    
}
