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
     * @ORM\OneToMany(targetEntity=TypeAuteur::class, mappedBy="auteurs")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Oeuvre::class, mappedBy="auteurs")
     */
    private $oeuvres;

    public function __construct()
    {
        $this->type = new ArrayCollection();
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

    /**
     * @return Collection|TypeAuteur[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(TypeAuteur $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setAuteurs($this);
        }

        return $this;
    }

    public function removeType(TypeAuteur $type): self
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getAuteurs() === $this) {
                $type->setAuteurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Oeuvre[]
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
