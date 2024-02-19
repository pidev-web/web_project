<?php

namespace App\Entity;

use App\Repository\ParaPharmacieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

#[ORM\Entity(repositoryClass: ParaPharmacieRepository::class)]
class ParaPharmacie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de la parapharmacie ne peut pas être vide.")]
    private ?string $nomPara = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'email ne peut pas être vide.")]
    #[Assert\Email(message: "Veuillez saisir une adresse e-mail valide.")]
    private ?string $email = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Le nombre de pharmaciens ne peut pas être vide.")]
    #[Assert\Range(
        min: 1,
        max: 20,
        notInRangeMessage: "Le nombre de pharmaciens doit être compris entre {{ min }} et {{ max }}."
    )]
    private ?int $nbrPharmaciens = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Le numéro de téléphone ne peut pas être vide.")]
    #[Assert\Range(
        min: 10000000,
        max: 99999999,
        notInRangeMessage: "Le numéro de téléphone doit être 8 chiffres"
    )]
    private ?int $numtel = null;

    #[ORM\Column(length: 255)]

    private ?string $etatPara = null;

    #[ORM\ManyToOne(inversedBy: 'relation',cascade:['remove'])]
    private ?Zone $ville = null;

    #[ORM\Column]
    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): static
    {
        $this->numtel = $numtel;

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
