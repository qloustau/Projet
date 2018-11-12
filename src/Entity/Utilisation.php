<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255)
     */
    private $lieuReception;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $destination;

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
}
