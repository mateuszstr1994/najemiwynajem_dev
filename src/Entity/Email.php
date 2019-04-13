<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\EmailTemplate;
use App\Entity\Person;
use App\Entity\SendEmail;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmailRepository")
 */
class Email extends AbstractBaseEntity
{
    /**
     * @ORM\Column(type="json")
     */
    private $data;
    
    /**
     * @ORM\ManyToOne(targetEntity="SendEmail", inversedBy="emails")
     * 
     */
    private $send_emails;
    
    /**
     * @ORM\ManyToOne(targetEntity="EmailTemplate")
     * 
     */
    private $template;
     
    /**
     * @ORM\ManyToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $recipient;
   
    /**
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date_sent;

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getSendEmail(): ?SendEmail
    {
        return $this->send_email;
    }

    public function setSendEmail(?SendEmail $send_emails): self
    {
        $this->send_email = $send_email;

        return $this;
    }

    public function getTemplate(): ?EmailTemplate
    {
        return $this->template;
    }

    public function setTemplate(?EmailTemplate $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getRecipient(): ?Person
    {
        return $this->recipient;
    }

    public function setRecipient(?User $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->date_sent;
    }

    public function setDateSent(?\DateTimeInterface $date_sent): self
    {
        $this->date_sent = $date_sent;

        return $this;
    }
}
