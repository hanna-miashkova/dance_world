<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MiastoRepository")
 */
class Miasto
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
    private $nazwaMiasta;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Szkola", mappedBy="miastoSzkoly")
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

    public function getNazwaMiasta(): ?string
    {
        return $this->nazwaMiasta;
    }

    public function setNazwaMiasta(string $nazwaMiasta): self
    {
        $this->nazwaMiasta = $nazwaMiasta;

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
            $szkola->setMiastoSzkoly($this);
        }

        return $this;
    }

    public function removeSzkola(Szkola $szkola): self
    {
        if ($this->szkolas->contains($szkola)) {
            $this->szkolas->removeElement($szkola);
            // set the owning side to null (unless already changed)
            if ($szkola->getMiastoSzkoly() === $this) {
                $szkola->setMiastoSzkoly(null);
            }
        }

        return $this;
    }
}
