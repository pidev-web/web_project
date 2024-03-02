<?php

namespace App\Entity;

use App\Repository\MedecinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedecinRepository::class)]
class Medecin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Horaire_consultation = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\ManyToOne(inversedBy: 'relation')]
    private ?Specialite $idMedcin = null;


    #[ORM\OneToMany(targetEntity: ReservationRdv::class, mappedBy: 'medecin')]
    private Collection $relation_rdv;

    #[ORM\OneToMany(targetEntity: FichePatient::class, mappedBy: 'relation_medecin')]
    private Collection $relationFiche;

    public function __construct()
    {
        $this->relation_rdv = new ArrayCollection();
        $this->relationFiche = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getHoraireConsultation(): ?\DateTimeInterface
    {
        return $this->Horaire_consultation;
    }

    public function setHoraireConsultation(\DateTimeInterface $Horaire_consultation): static
    {
        $this->Horaire_consultation = $Horaire_consultation;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getIdMedcin(): ?Specialite
    {
        return $this->idMedcin;
    }

    public function setIdMedcin(?Specialite $idMedcin): static
    {
        $this->idMedcin = $idMedcin;

        return $this;
    }

    /**
     * @return Collection<int, ReservationRdv>
     */
    public function getRelationRdv(): Collection
    {
        return $this->relation_rdv;
    }

    public function addRelationRdv(ReservationRdv $relationRdv): static
    {
        if (!$this->relation_rdv->contains($relationRdv)) {
            $this->relation_rdv->add($relationRdv);
            $relationRdv->setMedecin($this);
        }

        return $this;
    }

    public function removeRelationRdv(ReservationRdv $relationRdv): static
    {
        if ($this->relation_rdv->removeElement($relationRdv)) {
            // set the owning side to null (unless already changed)
            if ($relationRdv->getMedecin() === $this) {
                $relationRdv->setMedecin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FichePatient>
     */
    public function getRelationFiche(): Collection
    {
        return $this->relationFiche;
    }

    public function addRelationFiche(FichePatient $relationFiche): static
    {
        if (!$this->relationFiche->contains($relationFiche)) {
            $this->relationFiche->add($relationFiche);
            $relationFiche->setRelationMedecin($this);
        }

        return $this;
    }

    public function removeRelationFiche(FichePatient $relationFiche): static
    {
        if ($this->relationFiche->removeElement($relationFiche)) {
            // set the owning side to null (unless already changed)
            if ($relationFiche->getRelationMedecin() === $this) {
                $relationFiche->setRelationMedecin(null);
            }
        }

        return $this;
    }
}
