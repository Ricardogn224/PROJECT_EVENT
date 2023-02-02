<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'ID_evenement', targetEntity: Service::class)]
    private Collection $ID_service;

    public function __construct()
    {
        $this->ID_service = new ArrayCollection();
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

    /**
     * @return Collection<int, Service>
     */
    public function getIDService(): Collection
    {
        return $this->ID_service;
    }

    public function addIDService(Service $iDService): self
    {
        if (!$this->ID_service->contains($iDService)) {
            $this->ID_service->add($iDService);
            $iDService->setIDEvenement($this);
        }

        return $this;
    }

    public function removeIDService(Service $iDService): self
    {
        if ($this->ID_service->removeElement($iDService)) {
            // set the owning side to null (unless already changed)
            if ($iDService->getIDEvenement() === $this) {
                $iDService->setIDEvenement(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this -> getId();
    }
}
