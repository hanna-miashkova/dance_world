<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SzkolaRepository")
 */
class Szkola
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
    private $nazwaSzkoly;

    /**
     * @ORM\Column(type="text")
     */
    private $opisKrotki;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Miasto", inversedBy="szkolas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $miastoSzkoly;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pelnyOpis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $strona;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $zdjecie;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $wideo;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $kontakt;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $godzinyKontakt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Umiejetnosci", inversedBy="szkolas")
     */
    private $kategorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adres;

    public function __construct()
    {
        $this->kategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaSzkoly(): ?string
    {
        return $this->nazwaSzkoly;
    }

    public function setNazwaSzkoly(string $nazwaSzkoly): self
    {
        $this->nazwaSzkoly = $nazwaSzkoly;

        return $this;
    }

    public function getOpisKrotki(): ?string
    {
        return $this->opisKrotki;
    }

    public function setOpisKrotki(string $opisKrotki): self
    {
        $this->opisKrotki = $opisKrotki;

        return $this;
    }

    public function getMiastoSzkoly(): ?Miasto
    {
        return $this->miastoSzkoly;
    }

    public function setMiastoSzkoly(?Miasto $miastoSzkoly): self
    {
        $this->miastoSzkoly = $miastoSzkoly;

        return $this;
    }

    public function getPelnyOpis(): ?string
    {
        return $this->pelnyOpis;
    }

    public function setPelnyOpis(?string $pelnyOpis): self
    {
        $this->pelnyOpis = $pelnyOpis;

        return $this;
    }

    public function getStrona(): ?string
    {
        return $this->strona;
    }

    public function setStrona(string $strona): self
    {
        $this->strona = $strona;

        return $this;
    }

    public function getZdjecie(): ?string
    {
        return $this->zdjecie;
    }

    public function setZdjecie(string $zdjecie): self
    {
        $this->zdjecie = $zdjecie;

        return $this;
    }

    public function getWideo(): ?string
    {
        return $this->wideo;
    }

    public function setWideo(?string $wideo): self
    {
        $this->wideo = $wideo;

        return $this;
    }

    public function getKontakt(): ?string
    {
        return $this->kontakt;
    }

    public function setKontakt(?string $kontakt): self
    {
        $this->kontakt = $kontakt;

        return $this;
    }

    public function getGodzinyKontakt(): ?string
    {
        return $this->godzinyKontakt;
    }

    public function setGodzinyKontakt(?string $godzinyKontakt): self
    {
        $this->godzinyKontakt = $godzinyKontakt;

        return $this;
    }

    /**
     * @return Collection|Umiejetnosci[]
     */
    public function getKategorie(): Collection
    {
        return $this->kategorie;
    }

    public function addKategorie(Umiejetnosci $kategorie): self
    {
        if (!$this->kategorie->contains($kategorie)) {
            $this->kategorie[] = $kategorie;
        }

        return $this;
    }

    public function removeKategorie(Umiejetnosci $kategorie): self
    {
        if ($this->kategorie->contains($kategorie)) {
            $this->kategorie->removeElement($kategorie);
        }

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(?string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }


}
