<?php

namespace App\Entity;

use App\Repository\BunkerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BunkerRepository::class)]
class Bunker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $stockCapacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $residentCapacity = null;

     #[ORM\OneToOne(mappedBy: 'bunker', cascade: ['persist', 'remove'])]
    private ?User $owner = null;

     #[ORM\OneToMany(mappedBy: 'bunkerStock', targetEntity: Can::class)]
     private Collection $cans;

     #[ORM\OneToMany(mappedBy: 'bunkerHost', targetEntity: Resident::class)]
     private Collection $residents;

     public function __construct()
     {
         $this->cans = new ArrayCollection();
         $this->residents = new ArrayCollection();
     } 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStockCapacity(): ?int
    {
        return $this->stockCapacity;
    }

    public function setStockCapacity(?int $stockCapacity): self
    {
        $this->stockCapacity = $stockCapacity;

        return $this;
    }

    public function getResidentCapacity(): ?int
    {
        return $this->residentCapacity;
    }

    public function setResidentCapacity(?int $residentCapacity): self
    {
        $this->residentCapacity = $residentCapacity;

        return $this;
    }

     public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        // unset the owning side of the relation if necessaruser
        if ($owner === null && $this->owner !== null) {
            $this->owner->setBunker(null);
        }

        // set the owning side of the relation if necessaruser
        if ($owner !== null && $owner->getBunker() !== $this) {
            $owner->setBunker($this);
        }

        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, Can>
     */
    public function getCans(): Collection
    {
        return $this->cans;
    }

    public function addCan(Can $can): self
    {
        if (!$this->cans->contains($can)) {
            $this->cans->add($can);
            $can->setBunkerStock($this);
        }

        return $this;
    }

    public function removeCan(Can $can): self
    {
        if ($this->cans->removeElement($can)) {
            // set the owning side to null (unless already changed)
            if ($can->getBunkerStock() === $this) {
                $can->setBunkerStock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Resident>
     */
    public function getResidents(): Collection
    {
        return $this->residents;
    }

    public function addResident(Resident $resident): self
    {
        if (!$this->residents->contains($resident)) {
            $this->residents->add($resident);
            $resident->setBunkerHost($this);
        }

        return $this;
    }

    public function removeResident(Resident $resident): self
    {
        if ($this->residents->removeElement($resident)) {
            // set the owning side to null (unless already changed)
            if ($resident->getBunkerHost() === $this) {
                $resident->setBunkerHost(null);
            }
        }

        return $this;
    } 
}
