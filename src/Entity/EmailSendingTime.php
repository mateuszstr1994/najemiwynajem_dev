<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="email__sending_time")
 */
class EmailSendingTime extends AbstractBaseEntity
{
    /**
     * Many EmailSendingTime have one EmailSendingPriority. This is the owning side.
     * @ORM\ManyToOne(targetEntity="EmailSendingPriority", inversedBy="sending_time")
     */
    private $priority;
    
    
}
