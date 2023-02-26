<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[Vich\Uploadable]
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

    #[Vich\UploadableField(mapping: 'service_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'service', targetEntity: Demandes::class)]
    private Collection $demandes;

    #[ORM\ManyToMany(targetEntity: Evenement::class, mappedBy: 'services')]
    private Collection $evenements;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Caracteristique = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: OptionService::class, inversedBy: 'services')]
    private Collection $optionService;


    public function __construct()
    {
        $this->demandes = new ArrayCollection();
        $this->evenements = new ArrayCollection();
        $this->optionService = new ArrayCollection();
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
    
    public function __toString(): string
    {
        return $this->getNom();
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }


    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    /**
     * @return Collection<int, Demandes>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demandes $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes->add($demande);
            $demande->setService($this);
        }

        return $this;
    }

    public function removeDemande(Demandes $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getService() === $this) {
                $demande->setService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {

        $this->evenements[] = $evenement;
        $evenement->addService($this);
        return $this;

    }

    public function removeEvenement(Evenement $evenement): self
    {

        $this->evenements->removeElement($evenement);
        $evenement->removeService($this);

        return $this;

    }

    public function getCaracteristique(): ?string
    {
        return $this->Caracteristique;
    }

    public function setCaracteristique(?string $Caracteristique): self
    {
        $this->Caracteristique = $Caracteristique;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, OptionService>
     */
    public function getOptionService(): Collection
    {
        return $this->optionService;
    }

    public function addOptionService(OptionService $optionService): self
    {
        if (!$this->optionService->contains($optionService)) {
            $this->optionService->add($optionService);
        }

        return $this;
    }

    public function removeOptionService(OptionService $optionService): self
    {
        $this->optionService->removeElement($optionService);

        return $this;
    }

}
