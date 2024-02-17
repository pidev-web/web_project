<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     */

    #[ORM\Column]
    private ?int $idEvenement = null;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=255)
     */

    #[ORM\Column(length: 255)]
    private ?string $titreEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuEvenement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $descEvenement = null;

    #[ORM\ManyToOne(inversedBy: 'relation')]
    private ?CategorieEvenement $idCatEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEvenement(): ?int
    {
        return $this->idEvenement;
    }

    public function setIdEvenement(int $idEvenement): static
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }

    public function getTitreEvenement(): ?string
    {
        return $this->titreEvenement;
    }

    public function setTitreEvenement(string $titreEvenement): static
    {
        $this->titreEvenement = $titreEvenement;

        return $this;
    }

    public function getTypeEvenement(): ?string
    {
        return $this->TypeEvenement;
    }

    public function setTypeEvenement(string $TypeEvenement): static
    {
        $this->TypeEvenement = $TypeEvenement;

        return $this;
    }

    public function getLieuEvenement(): ?string
    {
        return $this->lieuEvenement;
    }

    public function setLieuEvenement(string $lieuEvenement): static
    {
        $this->lieuEvenement = $lieuEvenement;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(\DateTimeInterface $dateEvenement): static
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getDescEvenement(): ?string
    {
        return $this->descEvenement;
    }

    public function setDescEvenement(string $descEvenement): static
    {
        $this->descEvenement = $descEvenement;

        return $this;
    }

    public function getIdCatEvenement(): ?CategorieEvenement
    {
        return $this->idCatEvenement;
    }

    public function setIdCatEvenement(?CategorieEvenement $idCatEvenement): static
    {
        $this->idCatEvenement = $idCatEvenement;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
