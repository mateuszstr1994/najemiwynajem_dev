<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\BaseEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\EmailTemplatesRepository")
 */
class EmailTemplates extends BaseEntity
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
}
