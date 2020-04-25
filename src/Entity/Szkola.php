<?php

namespace App\Entity;

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


}
