<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="email__timetable")
 */
class EmailTimeTable extends AbstractBaseEntity
{
    /**
     * Many EmailSendingTime have one EmailPriority. This is the owning side.
     * @ORM\OneToMany(targetEntity="EmailPriority", mappedBy="timetable")
     */
    private $priority;
    
    // tu beda template gotowe, typu sr cz pt pn cale i bedzie mozna wybrac ktory w priority
    
    
}
