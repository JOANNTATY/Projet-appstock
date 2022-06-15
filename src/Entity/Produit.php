<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 200)]
    private $libelle;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $qtStock;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Entree::class, orphanRemoval: true)]
    private $entrees;

    #[ORM\OneToMany(mappedBy: 'Produit', targetEntity: Sortie::class, orphanRemoval: true)]
    private $yes;

    public function __construct()
    {
        $this->entrees = new ArrayCollection();
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getQtStock(): ?string
    {
        return $this->qtStock;
    }

    public function setQtStock(string $qtStock): self
    {
        $this->qtStock = $qtStock;

        return $this;
    }

    /**
     * @return Collection<int, Entree>
     */
    public function getEntrees(): Collection
    {
        return $this->entrees;
    }

    public function addEntree(Entree $entree): self
    {
        if (!$this->entrees->contains($entree)) {
            $this->entrees[] = $entree;
            $entree->setProduit($this);
        }

        return $this;
    }

    public function removeEntree(Entree $entree): self
    {
        if ($this->entrees->removeElement($entree)) {
            // set the owning side to null (unless already changed)
            if ($entree->getProduit() === $this) {
                $entree->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Sortie $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setProduit($this);
        }

        return $this;
    }

    public function removeYe(Sortie $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getProduit() === $this) {
                $ye->setProduit(null);
            }
        }

        return $this;
    }
}
