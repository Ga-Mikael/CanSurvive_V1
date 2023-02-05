<?php

namespace App\Service;

use App\Entity\Bunker;
use App\Entity\User;
use App\Repository\CanRepository;
use App\Repository\ResidentRepository;
use App\Repository\UserRepository;

class BunkerManager
{
    public function __construct(private CanRepository $canRepository, private ResidentRepository $residentRepository)
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

    public function getResidentDailyComsumption(Bunker $bunker, User $user): int
    {
        $residents = $this->residentRepository->findBy(['bunkerHost' => $bunker]);

        $residentComsumption = 0;
        foreach ($residents as $resident) {
            $residentComsumption += $resident->getDailyComsumption();
        }
        $totalResidentComsumption = $residentComsumption + $user->getDailyComsumption();

        return $totalResidentComsumption;
    }

}
