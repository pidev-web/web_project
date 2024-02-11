<?php

namespace App\Entity;

use App\Repository\ParaPharmacieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParaPharmacieRepository::class)]
class ParaPharmacie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idPara = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPara = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $nbrPharmaciens = null;

    #[ORM\Column]
    private ?int $n°tel = null;

    #[ORM\Column(length: 255)]
    private ?string $etatPara = null;

    #[ORM\ManyToOne(inversedBy: 'relation')]
    private ?Zone $ville = null;


    public function getIdPara(): ?int
    {
        return $this->idPara;
    }


    public function getNomPara(): ?string
    {
        return $this->nomPara;
    }

    public function setNomPara(string $nomPara): static
    {
        $this->nomPara = $nomPara;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getNbrPharmaciens(): ?int
    {
        return $this->nbrPharmaciens;
    }

    public function setNbrPharmaciens(int $nbrPharmaciens): static
    {
        $this->nbrPharmaciens = $nbrPharmaciens;

        return $this;
    }

    public function getN°tel(): ?int
    {
        return $this->n°tel;
    }

    public function setN°tel(int $n°tel): static
    {
        $this->n°tel = $n°tel;

        return $this;
    }

    public function getEtatPara(): ?string
    {
        return $this->etatPara;
    }

    public function setEtatPara(string $etatPara): static
    {
        $this->etatPara = $etatPara;

        return $this;
    }

    public function getVille(): ?Zone
    {
        return $this->ville;
    }

    public function setVille(?Zone $ville): static
    {
        $this->ville = $ville;

        return $this;
    }
}
