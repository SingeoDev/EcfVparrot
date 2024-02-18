<?php

namespace App\Entity;

use App\Repository\VehiclesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiclesRepository::class)]
#[Vich\Uploadable]
class Vehicles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez saisir un nom')]
    #[Assert\Length(min: 2, max: 50, minMessage: '2 caractères minimum', maxMessage: '50 caractères maximum')]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez saisir un prix')]
    private ?int $price = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'Veuillez saisir une date')]
    private ?\DateTimeInterface $years = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez saisir un kilométrage')]
    private ?int $mileage = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $fuel = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $gearbox = null;

    #[Vich\UploadableField(mapping: 'imagesVehicles', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message: 'Veuillez saisir une image')]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'vehicleId', targetEntity: ImageGallery::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $imageGalleries;

    #[ORM\OneToMany(mappedBy: 'vehicleId', targetEntity: Options::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $options;

    public function __construct()
    {
        $this->imageGalleries = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getYears(): ?\DateTimeInterface
    {
        return $this->years;
    }

    public function setYears(\DateTimeInterface $years): static
    {
        $this->years = $years;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(?string $fuel): static
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(?string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): self
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
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
     * @return Collection<int, ImageGallery>
     */
    public function getImageGalleries(): Collection
    {
        return $this->imageGalleries;
    }

    public function addImageGallery(ImageGallery $imageGallery): static
    {
        if (!$this->imageGalleries->contains($imageGallery)) {
            $this->imageGalleries->add($imageGallery);
            $imageGallery->setVehicleId($this);
        }

        return $this;
    }

    public function removeImageGallery(ImageGallery $imageGallery): static
    {
        if ($this->imageGalleries->removeElement($imageGallery)) {
            // set the owning side to null (unless already changed)
            if ($imageGallery->getVehicleId() === $this) {
                $imageGallery->setVehicleId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Options>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
            $option->setVehicleId($this);
        }

        return $this;
    }

    public function removeOption(Options $option): static
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getVehicleId() === $this) {
                $option->setVehicleId(null);
            }
        }

        return $this;
    }
}
