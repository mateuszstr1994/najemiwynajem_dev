<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="email__sending_priority")
 */
class EmailSendingPriority extends AbstractBaseEntity
{
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $priority;
    
    /**
     * One EmailSendigPriority has many EmailSendingTime.
     * @ORM\OneToMany(targetEntity="EmailSendingTime", mappedBy="priority")
     */
    private $sending_time;
    
    public function __construct() {
        parent::__construct;
        $this->sending_time = new ArrayCollection();
    }
    
}
