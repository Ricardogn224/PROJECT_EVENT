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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'ID_demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $ID_user = null;

    #[ORM\ManyToOne(inversedBy: 'ID_demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Service $ID_service = null;

    #[ORM\OneToMany(mappedBy: 'ID_demandes', targetEntity: Discussion::class, orphanRemoval: true)]
    private Collection $ID_discussion;

    #[ORM\OneToOne(mappedBy: 'ID_demande', cascade: ['persist', 'remove'])]
    private ?Discussion $discussion = null;

    public function __construct()
    {
        $this->ID_discussion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
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

    public function getIDUser(): ?Utilisateur
    {
        return $this->ID_user;
    }

    public function setIDUser(?Utilisateur $ID_user): self
    {
        $this->ID_user = $ID_user;

        return $this;
    }

    public function getIDService(): ?Service
    {
        return $this->ID_service;
    }

    public function setIDService(?Service $ID_service): self
    {
        $this->ID_service = $ID_service;

        return $this;
    }

    public function __toString(): string
    {
        return $this -> getId();
    }

    /**
     * @return Collection<int, Discussion>
     */
    public function getIDDiscussion(): Collection
    {
        return $this->ID_discussion;
    }

    public function addIDDiscussion(Discussion $iDDiscussion): self
    {
        if (!$this->ID_discussion->contains($iDDiscussion)) {
            $this->ID_discussion->add($iDDiscussion);
            $iDDiscussion->setIDDemandes($this);
        }

        return $this;
    }

    public function removeIDDiscussion(Discussion $iDDiscussion): self
    {
        if ($this->ID_discussion->removeElement($iDDiscussion)) {
            // set the owning side to null (unless already changed)
            if ($iDDiscussion->getIDDemandes() === $this) {
                $iDDiscussion->setIDDemandes(null);
            }
        }

        return $this;
    }

    public function getDiscussion(): ?Discussion
    {
        return $this->discussion;
    }

    public function setDiscussion(Discussion $discussion): self
    {
        // set the owning side of the relation if necessary
        if ($discussion->getIDDemande() !== $this) {
            $discussion->setIDDemande($this);
        }

        $this->discussion = $discussion;

        return $this;
    }
}
