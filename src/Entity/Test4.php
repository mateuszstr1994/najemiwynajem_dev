<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Test4Repository")
 */
class Test4
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
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Test3", inversedBy="test4")
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
    
    public function __toString()
    {
        return (string) $this->name;
    }
    
    function getTest3() {
        return $this->test3;
    }

    function setTest3($test3) {
        $this->test3 = $test3;
    }
    
}
