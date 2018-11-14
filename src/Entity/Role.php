<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 */
class Role
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personne", inversedBy="roles")
     */
    private $personnes;

    public function __construct()
    {
        $this->personnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|Personne[]
     */
    public function getUsers(): Collection
    {
        return $this->personnes;
    }

    public function addUser(Personne $personnes): self
    {
        if (!$this->personnes->contains($personnes)) {
            $this->personnes[] = $personnes;
        }

        return $this;
    }

    public function removeUser(Personne $personnes): self
    {
        if ($this->personnes->contains($personnes)) {
            $this->personnes->removeElement($personnes);
        }

        return $this;
    }
}
