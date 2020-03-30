<?php

namespace App\Entity;

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


}
