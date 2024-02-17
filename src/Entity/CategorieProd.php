<?php

namespace App\Entity;

use App\Repository\CategorieProdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategorieProdRepository::class)]
class CategorieProd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Assert\NotBlank(message: "ID is required")]
    #[Assert\GreaterThanOrEqual(0, message: "ID cannot be negative")]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Product name is required")]
    #[Assert\Regex(pattern: "/^[a-zA-Z]+$/", message: "Product name must contain only letters")]
    private ?string $nom_categorie = null;

    #[ORM\OneToMany(mappedBy: 'id_C', targetEntity: Produit::class)]
    private Collection $update_Prod;

    public function __construct()
    {
        $this->update_Prod = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCategorie(): ?int
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(int $id_categorie): static
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie): static
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getUpdateProd(): Collection
    {
        return $this->update_Prod;
    }

    public function addUpdateProd(Produit $updateProd): static
    {
        if (!$this->update_Prod->contains($updateProd)) {
            $this->update_Prod->add($updateProd);
            $updateProd->setIdC($this);
        }

        return $this;
    }

    public function removeUpdateProd(Produit $updateProd): static
    {
        if ($this->update_Prod->removeElement($updateProd)) {
            // set the owning side to null (unless already changed)
            if ($updateProd->getIdC() === $this) {
                $updateProd->setIdC(null);
            }
        }

        return $this;
    }
}
