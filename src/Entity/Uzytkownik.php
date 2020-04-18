<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UzytkownikRepository")
 * @UniqueEntity(fields={"nazwa_uzytkownika"}, message="There is already an account with this nazwa_uzytkownika")
 */
class Uzytkownik implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $nazwa_uzytkownika;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**

     * @ORM\Column(type="string", length=64)
     */
    private $haslo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Umiejetnosci")
     */
    private $umiejetnosci;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $info;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zdjecie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $plec;

    public function __construct()
    {
        $this->umiejetnosci = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaUzytkownika(): ?string
    {
        return $this->nazwa_uzytkownika;
    }

    public function setNazwaUzytkownika(string $nazwa_uzytkownika): self
    {
        $this->nazwa_uzytkownika = $nazwa_uzytkownika;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->nazwa_uzytkownika;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword()
    {
        return $this->haslo;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed for apps that do not check user passwords
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setHaslo(string $haslo): self
    {
        $this->haslo = $haslo;

        return $this;
    }

    /**
     * @return Collection|Umiejetnosci[]
     */
    public function getUmiejetnosci(): Collection
    {
        return $this->umiejetnosci;
    }

    public function addUmiejetnosci(Umiejetnosci $umiejetnosci): self
    {
        if (!$this->umiejetnosci->contains($umiejetnosci)) {
            $this->umiejetnosci[] = $umiejetnosci;
        }

        return $this;
    }

    public function removeUmiejetnosci(Umiejetnosci $umiejetnosci): self
    {
        if ($this->umiejetnosci->contains($umiejetnosci)) {
            $this->umiejetnosci->removeElement($umiejetnosci);
        }

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getZdjecie(): ?string
    {
        return $this->zdjecie;
    }

    public function setZdjecie(?string $zdjecie): self
    {
        $this->zdjecie = $zdjecie;

        return $this;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

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

    public function getPlec(): ?string
    {
        return $this->plec;
    }

    public function setPlec(string $plec): self
    {
        $this->plec = $plec;

        return $this;
    }


}
