<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuteurRepository::class)
 */
class Auteur
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
    private $nomoupseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAuteur::class, inversedBy="auteurs")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Oeuvre::class, mappedBy="auteurs")
     */
    private $oeuvres;

    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomoupseudo(): ?string
    {
        return $this->nomoupseudo;
    }

    public function setNomoupseudo(string $nomoupseudo): self
    {
        $this->nomoupseudo = $nomoupseudo;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getType(): ?TypeAuteur
    {
        return $this->type;
    }

    public function setType(?TypeAuteur $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Oeuvre>
     */
    public function getOeuvres(): Collection
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Oeuvre $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres[] = $oeuvre;
            $oeuvre->addAuteur($this);
        }

        return $this;
    }

    public function removeOeuvre(Oeuvre $oeuvre): self
    {
        if ($this->oeuvres->removeElement($oeuvre)) {
            $oeuvre->removeAuteur($this);
        }

        return $this;
    }
}
