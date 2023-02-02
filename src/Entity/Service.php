<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 2555)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $localisation = null;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'services')]
    private Collection $ID_utilisateur;

    #[ORM\ManyToMany(targetEntity: Demandes::class, mappedBy: 'ID_utilisateur')]
    private Collection $ID_demande;

    #[ORM\OneToMany(mappedBy: 'ID_service', targetEntity: Demandes::class, orphanRemoval: true)]
    private Collection $ID_demandes;

    #[ORM\ManyToOne(inversedBy: 'ID_service')]
    private ?Evenement $ID_evenement = null;

    public function __construct()
    {
        $this->ID_utilisateur = new ArrayCollection();
        $this->ID_demande = new ArrayCollection();
        $this->ID_demandes = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getIDUtilisateur(): Collection
    {
        return $this->ID_utilisateur;
    }

    public function addIDUtilisateur(Utilisateur $iDUtilisateur): self
    {
        if (!$this->ID_utilisateur->contains($iDUtilisateur)) {
            $this->ID_utilisateur->add($iDUtilisateur);
            $iDUtilisateur->addService($this);
        }

        return $this;
    }

    public function removeIDUtilisateur(Utilisateur $iDUtilisateur): self
    {
        if ($this->ID_utilisateur->removeElement($iDUtilisateur)) {
            $iDUtilisateur->removeService($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Demandes>
     */
    public function getIDDemande(): Collection
    {
        return $this->ID_demande;
    }

    public function addIDDemande(Demandes $iDDemande): self
    {
        if (!$this->ID_demande->contains($iDDemande)) {
            $this->ID_demande->add($iDDemande);
            $iDDemande->addIDUtilisateur($this);
        }

        return $this;
    }

    public function removeIDDemande(Demandes $iDDemande): self
    {
        if ($this->ID_demande->removeElement($iDDemande)) {
            $iDDemande->removeIDUtilisateur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Demandes>
     */
    public function getIDDemandes(): Collection
    {
        return $this->ID_demandes;
    }

    public function getIDEvenement(): ?Evenement
    {
        return $this->ID_evenement;
    }

    public function setIDEvenement(?Evenement $ID_evenement): self
    {
        $this->ID_evenement = $ID_evenement;

        return $this;
    }

    public function __toString(): string
    {
        return $this -> getId();
    }

  
}
