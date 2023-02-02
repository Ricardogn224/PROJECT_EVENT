<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'ID_utilisateur')]
    private Collection $services;

    #[ORM\OneToMany(mappedBy: 'ID_user', targetEntity: Demandes::class, orphanRemoval: true)]
    private Collection $ID_demandes;

    #[ORM\OneToMany(mappedBy: 'ID_utilisateur', targetEntity: Disponibilite::class)]
    private Collection $ID_disponibilite;

    #[ORM\OneToMany(mappedBy: 'ID_emmeteur', targetEntity: Message::class, orphanRemoval: true)]
    private Collection $ID_message;

    public function __construct()
    {
        $this->services = new ArrayCollection();
        $this->ID_demandes = new ArrayCollection();
        $this->ID_disponibilite = new ArrayCollection();
        $this->ID_message = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }

    /**
     * @return Collection<int, Demandes>
     */
    public function getIDDemandes(): Collection
    {
        return $this->ID_demandes;
    }

    public function addIDDemande(Demandes $iDDemande): self
    {
        if (!$this->ID_demandes->contains($iDDemande)) {
            $this->ID_demandes->add($iDDemande);
            $iDDemande->setIDUser($this);
        }

        return $this;
    }

    public function removeIDDemande(Demandes $iDDemande): self
    {
        if ($this->ID_demandes->removeElement($iDDemande)) {
            // set the owning side to null (unless already changed)
            if ($iDDemande->getIDUser() === $this) {
                $iDDemande->setIDUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Disponibilite>
     */
    public function getIDDisponibilite(): Collection
    {
        return $this->ID_disponibilite;
    }

    public function addIDDisponibilite(Disponibilite $iDDisponibilite): self
    {
        if (!$this->ID_disponibilite->contains($iDDisponibilite)) {
            $this->ID_disponibilite->add($iDDisponibilite);
            $iDDisponibilite->setIDUtilisateur($this);
        }

        return $this;
    }

    public function removeIDDisponibilite(Disponibilite $iDDisponibilite): self
    {
        if ($this->ID_disponibilite->removeElement($iDDisponibilite)) {
            // set the owning side to null (unless already changed)
            if ($iDDisponibilite->getIDUtilisateur() === $this) {
                $iDDisponibilite->setIDUtilisateur(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this -> getId();
    }

    /**
     * @return Collection<int, Message>
     */
    public function getIDMessage(): Collection
    {
        return $this->ID_message;
    }

    public function addIDMessage(Message $iDMessage): self
    {
        if (!$this->ID_message->contains($iDMessage)) {
            $this->ID_message->add($iDMessage);
            $iDMessage->setIDEmmeteur($this);
        }

        return $this;
    }

    public function removeIDMessage(Message $iDMessage): self
    {
        if ($this->ID_message->removeElement($iDMessage)) {
            // set the owning side to null (unless already changed)
            if ($iDMessage->getIDEmmeteur() === $this) {
                $iDMessage->setIDEmmeteur(null);
            }
        }

        return $this;
    }
}
