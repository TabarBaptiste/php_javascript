<?php

namespace App\Entity;

use App\Repository\RoueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RoueRepository::class)
 */
class Roue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(min=10, minMessage="Le diamètre doit faire au moins 10cm", max=20, maxMessage="Le diamètre doit faire au maximum 20cm")
     */
    private $diametre;

    /**
     * @ORM\ManyToMany(targetEntity=Vehicule::class)
     */
    private $Roues;

    public function __construct()
    {
        $this->Roues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiametre(): ?float
    {
        return $this->diametre;
    }

    public function setDiametre(float $diametre): self
    {
        $this->diametre = $diametre;

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getRoues(): Collection
    {
        return $this->Roues;
    }

    public function addRoue(Vehicule $roue): self
    {
        if (!$this->Roues->contains($roue)) {
            $this->Roues[] = $roue;
        }

        return $this;
    }

    public function removeRoue(Vehicule $roue): self
    {
        $this->Roues->removeElement($roue);

        return $this;
    }
}
