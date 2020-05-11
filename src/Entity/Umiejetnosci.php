<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UmiejetnosciRepository")
 */
class Umiejetnosci
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
    private $nazwa_umiejetnosci;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Szkola", mappedBy="kategorie")
     */
    private $szkolas;

    public function __construct()
    {
        $this->szkolas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaUmiejetnosci(): ?string
    {
        return $this->nazwa_umiejetnosci;
    }

    public function setNazwaUmiejetnosci(string $nazwa_umiejetnosci): self
    {
        $this->nazwa_umiejetnosci = $nazwa_umiejetnosci;

        return $this;
    }

    /**
     * @return Collection|Szkola[]
     */
    public function getSzkolas(): Collection
    {
        return $this->szkolas;
    }

    public function addSzkola(Szkola $szkola): self
    {
        if (!$this->szkolas->contains($szkola)) {
            $this->szkolas[] = $szkola;
            $szkola->addKategorie($this);
        }

        return $this;
    }

    public function removeSzkola(Szkola $szkola): self
    {
        if ($this->szkolas->contains($szkola)) {
            $this->szkolas->removeElement($szkola);
            $szkola->removeKategorie($this);
        }

        return $this;
    }
}
