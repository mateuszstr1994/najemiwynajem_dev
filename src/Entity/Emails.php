<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\EmailTemplates;
use App\Entity\People;
use App\Entity\SendEmails;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmailsRepository")
 */
class Emails extends BaseEntity
{
    /**
     * @ORM\Column(type="json")
     */
    private $data;
    
    /**
     * @ORM\ManyToOne(targetEntity="SendEmails", inversedBy="emails")
     * 
     */
    private $send_emails;
    
    /**
     * @ORM\ManyToOne(targetEntity="EmailTemplates")
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

    public function getSendEmails(): ?SendEmails
    {
        return $this->send_emails;
    }

    public function setSendEmails(?SendEmails $send_emails): self
    {
        $this->send_emails = $send_emails;

        return $this;
    }

    public function getTemplate(): ?EmailTemplates
    {
        return $this->template;
    }

    public function setTemplate(?EmailTemplates $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getRecipient(): ?People
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
