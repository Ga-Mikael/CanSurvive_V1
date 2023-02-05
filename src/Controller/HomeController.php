<?php

namespace App\Controller;

use App\Repository\CanRepository;
use App\Service\BunkerManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
class HomeController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function index(BunkerManager $bunkerManager): Response
    {
        /**  @var \App\Entity\User */
        $user = $this->getUser();
        $bunker = $user->getBunker();

        $totalCurrentStock = $bunkerManager->getAllCan($bunker);
        $totalComsumption = $bunkerManager->getResidentDailyComsumption($bunker, $user);
        $dayBeforeEnd = $totalCurrentStock / $totalComsumption;

        return $this->render('home/index.html.twig', [
            'bunker' => $bunker,
            'totalComsumption' => $bunkerManager->getResidentDailyComsumption($bunker, $user),
            'dayBeforeEnd' => $dayBeforeEnd,
            'canStock' => $bunkerManager->getAllCan($bunker),

        ]);
    }
}
