<?php

namespace App\Entity;

use App\Repository\OeuvreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OeuvreRepository::class)
 */
class Oeuvre
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee;

    /**
     * @ORM\ManyToMany(targetEntity=Auteur::class, inversedBy="oeuvres")
     */
    private $auteurs;

    /**
     * @ORM\ManyToMany(targetEntity=Edition::class, inversedBy="oeuvres")
     */
    private $editions;

    /**
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="oeuvres")
     */
    private $serie;

    /**
     * @ORM\OneToMany(targetEntity=Lieu::class, mappedBy="oeuvres")
     */
    private $lieu;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->editions = new ArrayCollection();
        $this->serie = new ArrayCollection();
        $this->lieu = new ArrayCollection();
    }

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        $this->auteurs->removeElement($auteur);

        return $this;
    }

    /**
     * @return Collection|Edition[]
     */
    public function getEditions(): Collection
    {
        return $this->editions;
    }

    public function addEdition(Edition $edition): self
    {
        if (!$this->editions->contains($edition)) {
            $this->editions[] = $edition;
        }

        return $this;
    }

    public function removeEdition(Edition $edition): self
    {
        $this->editions->removeElement($edition);

        return $this;
    }

    /**
     * @return Collection|Collection[]
     */
    public function getSerie(): Collection
    {
        return $this->collection;
    }

    public function addSerie(Collection $collection): self
    {
        if (!$this->collection->contains($collection)) {
            $this->collection[] = $collection;
            $collection->setOeuvres($this);
        }

        return $this;
    }

    public function removeSerie(Collection $collection): self
    {
        if ($this->collection->removeElement($collection)) {
            // set the owning side to null (unless already changed)
            if ($collection->getOeuvres() === $this) {
                $collection->setOeuvres(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Lieu[]
     */
    public function getLieu(): Collection
    {
        return $this->lieu;
    }

    public function addLieu(Lieu $lieu): self
    {
        if (!$this->lieu->contains($lieu)) {
            $this->lieu[] = $lieu;
            $lieu->setOeuvres($this);
        }

        return $this;
    }

    public function removeLieu(Lieu $lieu): self
    {
        if ($this->lieu->removeElement($lieu)) {
            // set the owning side to null (unless already changed)
            if ($lieu->getOeuvres() === $this) {
                $lieu->setOeuvres(null);
            }
        }

        return $this;
    }
}
