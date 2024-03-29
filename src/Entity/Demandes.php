<?php

namespace App\Entity;

use App\Repository\DemandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandesRepository::class)]
class Demandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    private ?Service $service = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $planedDate = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $debut_time = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $end_time = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $newPlanedDate = null;

    #[ORM\Column(nullable: true)]
    private ?bool $paiement = null;

    #[ORM\OneToOne(mappedBy: 'demande', cascade: ['persist', 'remove'])]
    private ?Commande $commande = null;

    #[ORM\Column(nullable: true)]
    private ?bool $propositionNouvelleDate = null;

    #[ORM\Column(nullable: true)]
    private ?float $note = null;

    #[ORM\Column(nullable: true)]
    private ?bool $serviceTermine = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getPlanedDate(): ?\DateTimeInterface
    {
        return $this->planedDate;
    }

    public function setPlanedDate(\DateTimeInterface $planedDate): self
    {
        $this->planedDate = $planedDate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDebutTime(): ?\DateTimeInterface
    {
        return $this->debut_time;
    }

    public function setDebutTime(\DateTimeInterface $debut_time): self
    {
        $this->debut_time = $debut_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getNewPlanedDate(): ?\DateTimeInterface
    {
        return $this->newPlanedDate;
    }

    public function setNewPlanedDate(?\DateTimeInterface $newPlanedDate): self
    {
        $this->newPlanedDate = $newPlanedDate;

        return $this;
    }

    public function isPaiement(): ?bool
    {
        return $this->paiement;
    }

    public function setPaiement(?bool $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(Commande $commande): self
    {
        // set the owning side of the relation if necessary
        if ($commande->getDemande() !== $this) {
            $commande->setDemande($this);
        }

        $this->commande = $commande;

        return $this;
    }

    public function isPropositionNouvelleDate(): ?bool
    {
        return $this->propositionNouvelleDate;
    }

    public function setPropositionNouvelleDate(?bool $propositionNouvelleDate): self
    {
        $this->propositionNouvelleDate = $propositionNouvelleDate;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function isServiceTermine(): ?bool
    {
        return $this->serviceTermine;
    }

    public function setServiceTermine(?bool $serviceTermine): self
    {
        $this->serviceTermine = $serviceTermine;

        return $this;
    }
}
