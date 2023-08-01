<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'project_id', targetEntity: ProjectImage::class)]
    private Collection $projectImages;

    public function __construct()
    {
        $this->projectImages = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->getNom();
    }
    
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

    /**
     * @return Collection<int, ProjectImage>
     */
    public function getProjectImages(): Collection
    {
        return $this->projectImages;
    }

    public function addProjectImage(ProjectImage $projectImage): static
    {
        if (!$this->projectImages->contains($projectImage)) {
            $this->projectImages->add($projectImage);
            $projectImage->setProjectId($this);
        }

        return $this;
    }

    public function removeProjectImage(ProjectImage $projectImage): static
    {
        if ($this->projectImages->removeElement($projectImage)) {
            // set the owning side to null (unless already changed)
            if ($projectImage->getProjectId() === $this) {
                $projectImage->setProjectId(null);
            }
        }

        return $this;
    }
}
