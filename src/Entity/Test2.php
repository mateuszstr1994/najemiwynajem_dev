<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\Test2Repository")
 */
class Test2
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    
    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Test3", mappedBy="test2")
     */
    private $test3;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
    
    function getTest3() {
        return $this->test3;
    }

    function setTest3($test3) {
        $this->test3 = $test3;
    }

    public function __construct() {
        $this->test3 = new ArrayCollection();
    }
    
    
    public function __toString()
    {
        return (string) $this->name;
    }

    
}
