<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $createdBy;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="App\Application\Sonata\UserBundle\Entity\User",
     * )
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $updatedBy;
    
    function getId() {
        return $this->id;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdateAt() {
        return $this->updateAt;
    }

    function getCreatedBy() {
        return $this->createdBy;
    }

    function getUpdatedBy() {
        return $this->updatedBy;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    function setUpdateAt($updateAt) {
        $this->updateAt = $updateAt;
    }

    function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }
    
}
