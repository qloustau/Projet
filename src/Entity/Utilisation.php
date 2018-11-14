<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisationRepository")
 */
class Utilisation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nature;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDebutUtilisation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFinUtilisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuReception;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $destination;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne", inversedBy="utilisations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="utilisations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voiture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plein", mappedBy="utilisation")
     */
    private $pleins;

    public function __construct()
    {
        $this->pleins = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getDateDebutUtilisation(): ?\DateTimeInterface
    {
        return $this->dateDebutUtilisation;
    }

    public function setDateDebutUtilisation(?\DateTimeInterface $dateDebutUtilisation): self
    {
        $this->dateDebutUtilisation = $dateDebutUtilisation;

        return $this;
    }

    public function getDateFinUtilisation(): ?\DateTimeInterface
    {
        return $this->dateFinUtilisation;
    }

    public function setDateFinUtilisation(?\DateTimeInterface $dateFinUtilisation): self
    {
        $this->dateFinUtilisation = $dateFinUtilisation;

        return $this;
    }

    public function getLieuReception(): ?string
    {
        return $this->lieuReception;
    }

    public function setLieuReception(string $lieuReception): self
    {
        $this->lieuReception = $lieuReception;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(?string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
            $plein->setUtilisation($this);
        }

        return $this;
    }

    public function removePlein(Plein $plein): self
    {
        if ($this->pleins->contains($plein)) {
            $this->pleins->removeElement($plein);
            // set the owning side to null (unless already changed)
            if ($plein->getUtilisation() === $this) {
                $plein->setUtilisation(null);
            }
        }

        return $this;
    }
}
