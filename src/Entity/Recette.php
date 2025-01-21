<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Positive()]
    #[Assert\LessThan(1440)]
    private ?float $time = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Positive()]
    #[Assert\LessThan(50)]
    private ?float $PeopleNb = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Range(min: 1, max: 5, notInRangeMessage: 'Le nombre de personnes doit être compris entre {{ min }} et {{ max }}.')]
    private ?float $difficulty = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Positive()]
    #[Assert\LessThan(1000)]
    private ?int $price = null;

    #[ORM\Column]
    private ?bool $isFavorite = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
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

    public function getTime(): ?float
    {
        return $this->time;
    }

    public function setTime(float $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getPeopleNb(): ?float
    {
        return $this->PeopleNb;
    }

    public function setPeopleNb(float $PeopleNb): static
    {
        $this->PeopleNb = $PeopleNb;

        return $this;
    }

    public function getDifficulty(): ?float
    {
        return $this->difficulty;
    }

    public function setDifficulty(float $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function setFavorite(bool $isFavorite): static
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
