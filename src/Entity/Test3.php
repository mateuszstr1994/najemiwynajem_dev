<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Test3Repository")
 */
class Test3
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
     * @ORM\ManyToOne(targetEntity="Test2", inversedBy="test3")
     */
     private $test2;
     
     /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Test4", mappedBy="test3")
     */
    private $test4;

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
    function getTest2() {
        return $this->test2;
    }

    function setTest2($test2) {
        $this->test2 = $test2;
    }
    
    public function __toString()
    {
        return (string) $this->name;
    }
    
}
