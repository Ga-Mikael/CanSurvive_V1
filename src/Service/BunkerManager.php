<?php

namespace App\Service;

use App\Entity\Bunker;
use App\Entity\User;
use App\Repository\CanRepository;

class BunkerManager
{
    public function __construct(private CanRepository $canRepository)
    {
    }

    public function getAllCan(Bunker $bunker): int
    {
        $cans = $this->canRepository->findBy(['bunkerStock' => $bunker]);
        $totalCans = 0;
        foreach ($cans as $can) {
            $totalCans += 1;
        }

        return $totalCans;
    }

}
