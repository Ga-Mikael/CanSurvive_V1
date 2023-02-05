<?php

namespace App\Entity;

use App\Repository\ResidentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResidentRepository::class)]
class Resident
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(nullable: true)]
    private ?int $dailyComsumption = null;

    #[ORM\ManyToOne(inversedBy: 'residents')]
    private ?Bunker $bunkerHost = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDailyComsumption(): ?int
    {
        return $this->dailyComsumption;
    }

    public function setDailyComsumption(?int $dailyComsumption): self
    {
        $this->dailyComsumption = $dailyComsumption;

        return $this;
    }

    public function getBunkerHost(): ?Bunker
    {
        return $this->bunkerHost;
    }

    public function setBunkerHost(?Bunker $bunkerHost): self
    {
        $this->bunkerHost = $bunkerHost;

        return $this;
    }
}
