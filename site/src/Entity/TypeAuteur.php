<?php

namespace App\Entity;

use App\Repository\TypeAuteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeAuteurRepository::class)
 */
class TypeAuteur
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
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class, inversedBy="type")
     */
    private $auteurs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAuteurs(): ?Auteur
    {
        return $this->auteurs;
    }

    public function setAuteurs(?Auteur $auteurs): self
    {
        $this->auteurs = $auteurs;

        return $this;
    }
}
