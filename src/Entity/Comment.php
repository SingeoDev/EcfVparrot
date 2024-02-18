<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Assert\Length(min: 2, max: 30, minMessage: '2 caractères minimum', maxMessage: '30 caractères maximum')]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ]+(?:[-\s][a-zA-ZÀ-ÿ]+)*$/', message: 'Veuillez saisir que des lettres')]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(min: 20, max: 500, minMessage: '20 caractères minimum', maxMessage: '500 caractères maximum')]
    private ?string $message = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez choisir entre une et cinq étoiles')]
    #[Assert\Range(min: 1, max: 5, notInRangeMessage: 'Veuillez choisir entre une et cinq étoiles')]
    private ?int $stars = null;

    #[ORM\Column]
    private ?bool $isValid = null;


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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(int $stars): static
    {
        $this->stars = $stars;

        return $this;
    }

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): static
    {
        $this->isValid = $isValid;

        return $this;
    }
}
