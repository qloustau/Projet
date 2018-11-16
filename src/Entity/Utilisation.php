<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(
     *     message = "Nature obligatoire !",
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 255
     * )
     */
    private $nature;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime(
     *     message = "Prénom de la personne qui conduit obligatoire !",
     * )
     */
    private $dateDebutUtilisation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime(
     *     message = "Le champs doit etre une Date !",
     * )
     */
    private $dateFinUtilisation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     min = 1,
     *     max = 255
     * )
     */
    private $destination;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(
     *     message = "Le champs doit etre une Date !",
     *     groups={"extern"}
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 255
     * )
     */
    private $nomPersonne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(
     *     message = "Prénom de la personne qui conduit obligatoire !",
     *     groups={"extern"}
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 255
     * )
     */
    private $prenomPersonne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne", inversedBy="utilisations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="utilisations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $voiture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email(
     *     message = "Le champs doit etre un email !",
     * )
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plein", mappedBy="utilisation")
     */
    private $pleins;

    public function __construct()
    {
        $this->pleins = new ArrayCollection();
        $this->dateDebutUtilisation = new \DateTime();
        $this->dateFinUtilisation = new \DateTime();
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

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(?string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getNomPersonne(): ?string
    {
        return $this->nomPersonne;
    }

    public function setNomPersonne(?string $nomPersonne): self
    {
        $this->nomPersonne = $nomPersonne;

        return $this;
    }

    public function getPrenomPersonne(): ?string
    {
        return $this->prenomPersonne;
    }

    public function setPrenomPersonne(?string $prenomPersonne): self
    {
        $this->prenomPersonne = $prenomPersonne;

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
