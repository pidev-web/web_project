<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialiteRepository::class)]
class Specialite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $sousSpecialite = null;

    #[ORM\Column]
    private ?int $anneExperience = null;

    #[ORM\OneToMany(targetEntity: medecin::class, mappedBy: 'idMedcin')]
    private Collection $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSousSpecialite(): ?string
    {
        return $this->sousSpecialite;
    }

    public function setSousSpecialite(string $sousSpecialite): static
    {
        $this->sousSpecialite = $sousSpecialite;

        return $this;
    }

    public function getAnneExperience(): ?int
    {
        return $this->anneExperience;
    }

    public function setAnneExperience(int $anneExperience): static
    {
        $this->anneExperience = $anneExperience;

        return $this;
    }

    /**
     * @return Collection<int, medecin>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(medecin $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
            $relation->setIdMedcin($this);
        }

        return $this;
    }

    public function removeRelation(medecin $relation): static
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getIdMedcin() === $this) {
                $relation->setIdMedcin(null);
            }
        }

        return $this;
    }
}
