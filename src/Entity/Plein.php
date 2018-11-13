<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PleinRepository")
 */
class Plein
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $kmDuPlein;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="pleins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voiture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisation", inversedBy="pleins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getKmDuPlein(): ?int
    {
        return $this->kmDuPlein;
    }

    public function setKmDuPlein(int $kmDuPlein): self
    {
        $this->kmDuPlein = $kmDuPlein;

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

    public function getUtilisation(): ?Utilisation
    {
        return $this->utilisation;
    }

    public function setUtilisation(?Utilisation $utilisation): self
    {
        $this->utilisation = $utilisation;

        return $this;
    }
}
