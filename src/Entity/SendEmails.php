<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\People;
use App\Application\Sonata\UserBundle\Entity\User;
/**
 * @ORM\Entity
 * @ORM\Table(name="send_emails")
 */
class SendEmails extends AbstractBaseEntity
{
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
     * @ORM\ManyToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $recipient;
    
    /**
     * OneToMany(targetEntity="Emails", mappedBy="send_emails", fetch="EXTRA_LAZY", cascade={"persist"})
     */
    private $emails = [];
    
    /**
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date_sent;

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getBodyPlainText(): ?string
    {
        return $this->body_plain_text;
    }

    public function setBodyPlainText(?string $body_plain_text): self
    {
        $this->body_plain_text = $body_plain_text;

        return $this;
    }

    public function getBodyHtml(): ?string
    {
        return $this->body_html;
    }

    public function setBodyHtml(?string $body_html): self
    {
        $this->body_html = $body_html;

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
