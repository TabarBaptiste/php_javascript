<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $model;

    /**
     * @ORM\OneToOne(targetEntity=Chassis::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Chassis;

    /**
     * @ORM\ManyToMany(targetEntity=Roue::class, mappedBy="Roues", cascade={"persist", "remove"})
     */
    private $roues;

    /**
     * @ORM\OneToOne(targetEntity=Moteur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $moteur;


    public function __construct()
    {
        $this->roues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getChassis(): ?Chassis
    {
        return $this->Chassis;
    }

    public function setChassis(Chassis $Chassis): self
    {
        $this->Chassis = $Chassis;

        return $this;
    }

    public function getMoteur(): ?Moteur
    {
        return $this->moteur;
    }

    public function setMoteur(?Moteur $moteur): self
    {
        $this->moteur = $moteur;
        return $this;
    }

    /**
     * @return Collection<int, Roue>
     */
    public function getRoues(): Collection
    {
        return $this->roues;
    }

    public function addRoue(Roue $roue): self
    {
        if (!$this->roues->contains($roue)) {
            $this->roues[] = $roue;
        }
        return $this;
    }

    public function removeRoue(Roue $roue): self
    {
        if ($this->roues->removeElement($roue)) {
            $roue->removeRoue($this);
        }
        return $this;
    }
}
