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

    #[ORM\Column]
    public ?int $id_demande = null;

    #[ORM\Column]
    public ?int $id_emmeteur = null;

    #[ORM\Column]
    public ?int $id_destinataire = null;

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

    public function getIdDemande(): ?int
    {
        return $this->id_demande;
    }

    public function setIdDemande(int $id_demande): self
    {
        $this->id_demande = $id_demande;

        return $this;
    }

    public function getIdEmmeteur(): ?int
    {
        return $this->id_emmeteur;
    }

    public function setIdEmmeteur(int $id_emmeteur): self
    {
        $this->id_emmeteur = $id_emmeteur;

        return $this;
    }

    public function getIdDestinataire(): ?int
    {
        return $this->id_destinataire;
    }

    public function setIdDestinataire(int $id_destinataire): self
    {
        $this->id_destinataire = $id_destinataire;

        return $this;
    }
}
