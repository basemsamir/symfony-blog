<?php

namespace App\Entity;

use App\Repository\NewsLetterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsLetterRepository::class)
 */
class NewsLetter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $subscribed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSubscribed(): ?bool
    {
        return $this->subscribed;
    }

    public function setSubscribed(bool $subscribed): self
    {
        $this->subscribed = $subscribed;

        return $this;
    }
}
