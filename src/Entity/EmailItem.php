<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\EmailTemplate;
use App\Entity\Person;
use App\Entity\Email;

/**
 * @ORM\Entity
 * @ORM\Table(name="email__item")
 */
class EmailItem extends AbstractBaseEntity
{
    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $data;
    
    /**
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="email")
     * 
     */
    private $email;
    
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

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return EmailItem
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return SendEmail|null
     */
    public function getSendEmail(): ?SendEmail
    {
        return $this->send_email;
    }

    /**
     * @param SendEmail|null $send_emails
     * @return EmailItem
     */
    public function setSendEmail(?SendEmail $send_email): self
    {
        $this->send_email = $send_email;

        return $this;
    }

    /**
     * @return \App\Entity\EmailTemplate|null
     */
    public function getTemplate(): ?EmailTemplate
    {
        return $this->template;
    }

    /**
     * @param \App\Entity\EmailTemplate|null $template
     * @return EmailItem
     */
    public function setTemplate(?EmailTemplate $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return \App\Entity\Person|null
     */
    public function getRecipient(): ?Person
    {
        return $this->recipient;
    }

    /**
     * @param User|null $recipient
     * @return EmailItem
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->date_sent;
    }

    /**
     * @param \DateTimeInterface|null $date_sent
     * @return EmailItem
     */
    public function setDateSent(?\DateTimeInterface $date_sent): self
    {
        $this->date_sent = $date_sent;

        return $this;
    }
}
