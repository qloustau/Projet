<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $immat;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $marque;

    /**
     * @ORM\Column(type="integer")
     */
    private $km_total;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="integer")
     */
    private $reservoir;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponibilite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="voiture")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisation", mappedBy="voiture")
     */
    private $utilisations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plein", mappedBy="voiture")
     */
    private $pleins;

    /**
     * @ORM\Column(type="string")
     */
    private $images;


    public function getImages()
    {
        return $this->images;
    }


    public function setImages($images): self
    {
         $this->images = $images;
         return $this;
    }


    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->utilisations = new ArrayCollection();
        $this->pleins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmat(): ?string
    {
        return $this->immat;
    }
    public function setImmat(string $immat): self
    {
        $this->immat = $immat;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getKmTotal(): ?int
    {
        return $this->km_total;
    }

    public function setKmTotal(int $km_total): self
    {
        $this->km_total = $km_total;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getReservoir(): ?int
    {
        return $this->reservoir;
    }

    public function setReservoir(int $reservoir): self
    {
        $this->reservoir = $reservoir;

        return $this;
    }

    public function getDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setVoiture($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getVoiture() === $this) {
                $commentaire->setVoiture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisation[]
     */
    public function getUtilisation(): Collection
    {
        return $this->utilisations;
    }

    public function addUtilisation(Utilisation $utilisation): self
    {
        if (!$this->utilisations->contains($utilisation)) {
            $this->utilisations[] = $utilisation;
            $utilisation->setVoiture($this);
        }

        return $this;
    }

    public function removeUtilisation(Utilisation $utilisation): self
    {
        if ($this->utilisations->contains($utilisation)) {
            $this->utilisations->removeElement($utilisation);
            // set the owning side to null (unless already changed)
            if ($utilisation->getVoiture() === $this) {
                $utilisation->setVoiture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plein[]
     */
    public function getPleins(): Collection
    {
        return $this->pleins;
    }

    public function addPlein(Plein $plein): self
    {
        if (!$this->pleins->contains($plein)) {
            $this->pleins[] = $plein;
            $plein->setVoiture($this);
        }

        return $this;
    }

    public function removePlein(Plein $plein): self
    {
        if ($this->pleins->contains($plein)) {
            $this->pleins->removeElement($plein);
            // set the owning side to null (unless already changed)
            if ($plein->getVoiture() === $this) {
                $plein->setVoiture(null);
            }
        }

        return $this;
    }
}
