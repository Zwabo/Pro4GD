<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FriendRequestRepository")
 */
class FriendRequest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="outgoingFriendRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="incomingFriendRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $receiver;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSender(): ?user
    {
        return $this->sender;
    }

    public function setSender(?user $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?user
    {
        return $this->receiver;
    }

    public function setReceiver(?user $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }
}
