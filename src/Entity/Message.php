<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'ID_message')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $ID_emmeteur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $ID_destinataire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

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

    public function getIDEmmeteur(): ?Utilisateur
    {
        return $this->ID_emmeteur;
    }

    public function setIDEmmeteur(?Utilisateur $ID_emmeteur): self
    {
        $this->ID_emmeteur = $ID_emmeteur;

        return $this;
    }

    public function getIDDestinataire(): ?Utilisateur
    {
        return $this->ID_destinataire;
    }

    public function setIDDestinataire(?Utilisateur $ID_destinataire): self
    {
        $this->ID_destinataire = $ID_destinataire;

        return $this;
    }
}
