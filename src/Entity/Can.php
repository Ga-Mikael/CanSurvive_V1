<?php

namespace App\Entity;

use App\Repository\CanRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CanRepository::class)]
class Can
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $expirationDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $barCode = null;

    #[ORM\ManyToOne(inversedBy: 'cans')]
    private ?Bunker $bunkerStock = null;

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


    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?\DateTimeInterface $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getBarCode(): ?int
    {
        return $this->barCode;
    }

    public function setBarCode(?int $barCode): self
    {
        $this->barCode = $barCode;

        return $this;
    }

    public function getBunkerStock(): ?Bunker
    {
        return $this->bunkerStock;
    }

    public function setBunkerStock(?Bunker $bunkerStock): self
    {
        $this->bunkerStock = $bunkerStock;

        return $this;
    }
}
