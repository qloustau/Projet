<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="personne")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisation", mappedBy="personne")
     */
    private $utilisations;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Role", mappedBy="personnes")
     */
    private $roles;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->utilisations = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }

    public function __toString()
    {
        return ' '.$this->nom;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(?string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

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
            $commentaire->setPersonne($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getPersonne() === $this) {
                $commentaire->setPersonne(null);
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
            $utilisation->setPersonne($this);
        }

        return $this;
    }

    public function removeUtilisation(Utilisation $utilisation): self
    {
        if ($this->utilisations->contains($utilisation)) {
            $this->utilisations->removeElement($utilisation);
            // set the owning side to null (unless already changed)
            if ($utilisation->getPersonne() === $this) {
                $utilisation->setPersonne(null);
            }
        }

        return $this;
    }


    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->mdp;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->nom;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {}
        /**
         * Returns the roles granted to the user.

         *
         * Alternatively, the roles might be stored on a ``roles`` property,
         * and populated in any number of different ways when the user object
         * is created.
         *
         * @return (Role|string)[] The user roles
         */
        public
        function getRoles(): array
        {
            $roles = [];
            $this->roles->map(function(Role $role)use (&$roles){
                $roles[]= $role->getRole();
            });
            return $roles;
        }

        public
        function addRole(Role $role): self
        {
            if (!$this->roles->contains($role)) {
                $this->roles[] = $role;
                $role->addUser($this);
            }

            return $this;
        }

        public
        function removeRole(Role $role): self
        {
            if ($this->roles->contains($role)) {
                $this->roles->removeElement($role);
                $role->removeUser($this);
            }

            return $this;
        }
}
