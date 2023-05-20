<?php

namespace App\Entity;

use App\Repository\AccreditationProRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccreditationProRepository::class)]
class AccreditationPro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $enAttente = null;

    #[ORM\Column]
    private ?bool $estAccepte = null;

    #[ORM\OneToOne(inversedBy: 'accreditationPro', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isEnAttente(): ?bool
    {
        return $this->enAttente;
    }

    public function setEnAttente(bool $enAttente): self
    {
        $this->enAttente = $enAttente;

        return $this;
    }

    public function isEstAccepte(): ?bool
    {
        return $this->estAccepte;
    }

    public function setEstAccepte(bool $estAccepte): self
    {
        $this->estAccepte = $estAccepte;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
