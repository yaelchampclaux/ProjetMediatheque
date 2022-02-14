<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbtomes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $info;

    /**
     * @ORM\ManyToOne(targetEntity=Oeuvre::class, inversedBy="serie")
     */
    private $oeuvres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbtomes(): ?int
    {
        return $this->nbtomes;
    }

    public function setNbtomes(int $nbtomes): self
    {
        $this->nbtomes = $nbtomes;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getOeuvres(): ?Oeuvre
    {
        return $this->oeuvres;
    }

    public function setOeuvres(?Oeuvre $oeuvres): self
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }
}
