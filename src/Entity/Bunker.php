<?php

namespace App\Entity;

use App\Repository\BunkerRepository;
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
}
