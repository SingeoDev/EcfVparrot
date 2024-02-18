<?php

namespace App\Entity;

use App\Repository\OpenDayRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpenDayRepository::class)]
class OpenDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mondayAmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mondayAmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mondayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mondayPmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tuesdayAmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tuesdayAmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tuesdayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tuesdayPmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $wednesdayAmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $wednesdayAmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $wednesdayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $wednesdayPmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $thursdayAmBegin = null;
    
    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $thursdayAmFinish = null;
    
    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $thursdayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $thursdayPmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fridayAmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fridayAmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fridayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fridayPmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $saturdayAmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $saturdayAmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $saturdayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $saturdayPmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sundayAmBegin = null;
    
    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sundayAmFinish = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sundayPmBegin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sundayPmFinish = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMondayAmBegin(): ?\DateTimeInterface
    {
        return $this->mondayAmBegin;
    }

    public function setMondayAmBegin(?\DateTimeInterface $mondayAmBegin): static
    {
        $this->mondayAmBegin = $mondayAmBegin;

        return $this;
    }

    public function getMondayAmFinish(): ?\DateTimeInterface
    {
        return $this->mondayAmFinish;
    }

    public function setMondayAmFinish(?\DateTimeInterface $mondayAmFinish): static
    {
        $this->mondayAmFinish = $mondayAmFinish;

        return $this;
    }

    public function getMondayPmBegin(): ?\DateTimeInterface
    {
        return $this->mondayPmBegin;
    }

    public function setMondayPmBegin(?\DateTimeInterface $mondayPmBegin): static
    {
        $this->mondayPmBegin = $mondayPmBegin;

        return $this;
    }

    public function getMondayPmFinish(): ?\DateTimeInterface
    {
        return $this->mondayPmFinish;
    }

    public function setMondayPmFinish(?\DateTimeInterface $mondayPmFinish): static
    {
        $this->mondayPmFinish = $mondayPmFinish;

        return $this;
    }

    public function getTuesdayAmBegin(): ?\DateTimeInterface
    {
        return $this->tuesdayAmBegin;
    }

    public function setTuesdayAmBegin(?\DateTimeInterface $tuesdayAmBegin): static
    {
        $this->tuesdayAmBegin = $tuesdayAmBegin;

        return $this;
    }

    public function getTuesdayAmFinish(): ?\DateTimeInterface
    {
        return $this->tuesdayAmFinish;
    }

    public function setTuesdayAmFinish(?\DateTimeInterface $tuesdayAmFinish): static
    {
        $this->tuesdayAmFinish = $tuesdayAmFinish;

        return $this;
    }

    public function getTuesdayPmBegin(): ?\DateTimeInterface
    {
        return $this->tuesdayPmBegin;
    }

    public function setTuesdayPmBegin(?\DateTimeInterface $tuesdayPmBegin): static
    {
        $this->tuesdayPmBegin = $tuesdayPmBegin;

        return $this;
    }

    public function getTuesdayPmFinish(): ?\DateTimeInterface
    {
        return $this->tuesdayPmFinish;
    }

    public function setTuesdayPmFinish(?\DateTimeInterface $tuesdayPmFinish): static
    {
        $this->tuesdayPmFinish = $tuesdayPmFinish;

        return $this;
    }

    public function getWednesdayAmBegin(): ?\DateTimeInterface
    {
        return $this->wednesdayAmBegin;
    }

    public function setWednesdayAmBegin(?\DateTimeInterface $wednesdayAmBegin): static
    {
        $this->wednesdayAmBegin = $wednesdayAmBegin;

        return $this;
    }

    public function getWednesdayAmFinish(): ?\DateTimeInterface
    {
        return $this->wednesdayAmFinish;
    }

    public function setWednesdayAmFinish(?\DateTimeInterface $wednesdayAmFinish): static
    {
        $this->wednesdayAmFinish = $wednesdayAmFinish;

        return $this;
    }

    public function getWednesdayPmBegin(): ?\DateTimeInterface
    {
        return $this->wednesdayPmBegin;
    }

    public function setWednesdayPmBegin(?\DateTimeInterface $wednesdayPmBegin): static
    {
        $this->wednesdayPmBegin = $wednesdayPmBegin;

        return $this;
    }

    public function getWednesdayPmFinish(): ?\DateTimeInterface
    {
        return $this->wednesdayPmFinish;
    }

    public function setWednesdayPmFinish(?\DateTimeInterface $wednesdayPmFinish): static
    {
        $this->wednesdayPmFinish = $wednesdayPmFinish;

        return $this;
    }

    public function getThursdayAmBegin(): ?\DateTimeInterface
    {
        return $this->thursdayAmBegin;
    }

    public function setThursdayAmBegin(?\DateTimeInterface $thursdayAmBegin): static
    {
        $this->thursdayAmBegin = $thursdayAmBegin;

        return $this;
    }

    public function getThursdayAmFinish(): ?\DateTimeInterface
    {
        return $this->thursdayAmFinish;
    }

    public function setThursdayAmFinish(?\DateTimeInterface $thursdayAmFinish): static
    {
        $this->thursdayAmFinish = $thursdayAmFinish;

        return $this;
    }

    public function getThursdayPmBegin(): ?\DateTimeInterface
    {
        return $this->thursdayPmBegin;
    }

    public function setThursdayPmBegin(?\DateTimeInterface $thursdayPmBegin): static
    {
        $this->thursdayPmBegin = $thursdayPmBegin;

        return $this;
    }

    public function getThursdayPmFinish(): ?\DateTimeInterface
    {
        return $this->thursdayPmFinish;
    }

    public function setThursdayPmFinish(?\DateTimeInterface $thursdayPmFinish): static
    {
        $this->thursdayPmFinish = $thursdayPmFinish;

        return $this;
    }

    public function getFridayAmBegin(): ?\DateTimeInterface
    {
        return $this->fridayAmBegin;
    }

    public function setFridayAmBegin(?\DateTimeInterface $fridayAmBegin): static
    {
        $this->fridayAmBegin = $fridayAmBegin;

        return $this;
    }

    public function getFridayAmFinish(): ?\DateTimeInterface
    {
        return $this->fridayAmFinish;
    }

    public function setFridayAmFinish(?\DateTimeInterface $fridayAmFinish): static
    {
        $this->fridayAmFinish = $fridayAmFinish;

        return $this;
    }

    public function getFridayPmBegin(): ?\DateTimeInterface
    {
        return $this->fridayPmBegin;
    }

    public function setFridayPmBegin(?\DateTimeInterface $fridayPmBegin): static
    {
        $this->fridayPmBegin = $fridayPmBegin;

        return $this;
    }

    public function getFridayPmFinish(): ?\DateTimeInterface
    {
        return $this->fridayPmFinish;
    }

    public function setFridayPmFinish(?\DateTimeInterface $fridayPmFinish): static
    {
        $this->fridayPmFinish = $fridayPmFinish;

        return $this;
    }

    public function getSaturdayAmBegin(): ?\DateTimeInterface
    {
        return $this->saturdayAmBegin;
    }

    public function setSaturdayAmBegin(?\DateTimeInterface $saturdayAmBegin): static
    {
        $this->saturdayAmBegin = $saturdayAmBegin;

        return $this;
    }

    public function getSaturdayAmFinish(): ?\DateTimeInterface
    {
        return $this->saturdayAmFinish;
    }

    public function setSaturdayAmFinish(?\DateTimeInterface $saturdayAmFinish): static
    {
        $this->saturdayAmFinish = $saturdayAmFinish;

        return $this;
    }

    public function getSaturdayPmBegin(): ?\DateTimeInterface
    {
        return $this->saturdayPmBegin;
    }

    public function setSaturdayPmBegin(?\DateTimeInterface $saturdayPmBegin): static
    {
        $this->saturdayPmBegin = $saturdayPmBegin;

        return $this;
    }

    public function getSaturdayPmFinish(): ?\DateTimeInterface
    {
        return $this->saturdayPmFinish;
    }

    public function setSaturdayPmFinish(?\DateTimeInterface $saturdayPmFinish): static
    {
        $this->saturdayPmFinish = $saturdayPmFinish;

        return $this;
    }

    public function getSundayAmBegin(): ?\DateTimeInterface
    {
        return $this->sundayAmBegin;
    }

    public function setSundayAmBegin(?\DateTimeInterface $sundayAmBegin): static
    {
        $this->sundayAmBegin = $sundayAmBegin;

        return $this;
    }

    public function getSundayAmFinish(): ?\DateTimeInterface
    {
        return $this->sundayAmFinish;
    }

    public function setSundayAmFinish(?\DateTimeInterface $sundayAmFinish): static
    {
        $this->sundayAmFinish = $sundayAmFinish;

        return $this;
    }

    public function getSundayPmBegin(): ?\DateTimeInterface
    {
        return $this->sundayPmBegin;
    }

    public function setSundayPmBegin(?\DateTimeInterface $sundayPmBegin): static
    {
        $this->sundayPmBegin = $sundayPmBegin;

        return $this;
    }

    public function getSundayPmFinish(): ?\DateTimeInterface
    {
        return $this->sundayPmFinish;
    }

    public function setSundayPmFinish(?\DateTimeInterface $sundayPmFinish): static
    {
        $this->sundayPmFinish = $sundayPmFinish;

        return $this;
    }

}
