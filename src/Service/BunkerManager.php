<?php

namespace App\Service;

use App\Repository\BunkerRepository;
use App\Repository\CanRepository;

class BunkerManager
{
    public function __construct(private CanRepository $canRepository, private BunkerRepository $bunkerRepository)
    {
    }

    public function getAllCan(): int
    {
        $totalCans = 0;
        $cans = $this->canRepository->findAll();
        foreach ($cans as $can) {
            $totalCans += 1;
        }

        return $totalCans;
    }

    public function getBunkerCapacity(): int
    {
        $bunkers = $this->bunkerRepository->findBy();
        $stockMax = $this->bunkerRepository->getCapacity();

        return $stockMax;
    }
}
