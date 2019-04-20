<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\AbstractBaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table(name="email__template")
 */
class EmailTemplate extends AbstractBaseEntity
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;
    
    /**
     * @ORM\Column(type="text", nullable=true, length=65535)
     */
    private $body_plain_text;
    
    /**
     * @ORM\Column(type="text", nullable=true, length=65535)
     */
    private $body_html;
    
    /**
     * @ORM\ManyToOne(targetEntity="EmailPriority")
     */
    private $priority;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getBodyPlainText()
    {
        return $this->body_plain_text;
    }

    /**
     * @param mixed $body_plain_text
     */
    public function setBodyPlainText($body_plain_text): void
    {
        $this->body_plain_text = $body_plain_text;
    }

    /**
     * @return mixed
     */
    public function getBodyHtml()
    {
        return $this->body_html;
    }

    /**
     * @param mixed $body_html
     */
    public function setBodyHtml($body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority): void
    {
        $this->priority = $priority;
    }

}
