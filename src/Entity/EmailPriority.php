<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="email__priority")
 */
class EmailPriority extends AbstractBaseEntity
{
    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $priority;
    
    /**
     * One EmailSendigPriority has many EmailSendingTime.
     * @ORM\ManyToOne(targetEntity="EmailTimeTable", inversedBy="priority")
     */
    private $timetable;
    
    public function __construct() {
        parent::__construct;
        $this->sending_time = new ArrayCollection();
    }
    
}
