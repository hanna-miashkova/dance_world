<?php

namespace App\Entity;

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
}
