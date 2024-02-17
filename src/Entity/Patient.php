<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idPatient = null;

    #[ORM\Column(length: 255)]
    private ?string $nomP = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomP = null;

    #[ORM\Column(length: 255)]
    private ?string $email_P = null;

    #[ORM\Column]
    private ?int $numTelP = null;

    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: FichePatient::class)]
    private Collection $relationPatient;

    public function __construct()
    {
        $this->relationPatient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPatient(): ?string
    {
        return $this->idPatient;
    }

    public function setIdPatient(string $idPatient): static
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    public function getNomP(): ?string
    {
        return $this->nomP;
    }

    public function setNomP(string $nomP): static
    {
        $this->nomP = $nomP;

        return $this;
    }

    public function getPrenomP(): ?string
    {
        return $this->prenomP;
    }

    public function setPrenomP(string $prenomP): static
    {
        $this->prenomP = $prenomP;

        return $this;
    }

    public function getEmailP(): ?string
    {
        return $this->email_P;
    }

    public function setEmailP(string $email_P): static
    {
        $this->email_P = $email_P;

        return $this;
    }

    public function getNumTelP(): ?int
    {
        return $this->numTelP;
    }

    public function setNumTelP(int $numTelP): static
    {
        $this->numTelP = $numTelP;

        return $this;
    }

    /**
     * @return Collection<int, FichePatient>
     */
    public function getRelationPatient(): Collection
    {
        return $this->relationPatient;
    }

    public function addRelationPatient(FichePatient $relationPatient): static
    {
        if (!$this->relationPatient->contains($relationPatient)) {
            $this->relationPatient->add($relationPatient);
            $relationPatient->setRelation($this);
        }

        return $this;
    }

    public function removeRelationPatient(FichePatient $relationPatient): static
    {
        if ($this->relationPatient->removeElement($relationPatient)) {
            // set the owning side to null (unless already changed)
            if ($relationPatient->getRelation() === $this) {
                $relationPatient->setRelation(null);
            }
        }

        return $this;
    }
}
