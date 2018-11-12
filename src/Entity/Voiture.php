<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=25)
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
}
