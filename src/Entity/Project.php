<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $principal_tech = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondary_tech = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrincipalTech(): ?string
    {
        return $this->principal_tech;
    }

    public function setPrincipalTech(string $principal_tech): static
    {
        $this->principal_tech = $principal_tech;

        return $this;
    }

    public function getSecondaryTech(): ?string
    {
        return $this->secondary_tech;
    }

    public function setSecondaryTech(?string $secondary_tech): static
    {
        $this->secondary_tech = $secondary_tech;

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
}
