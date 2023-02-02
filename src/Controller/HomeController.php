<?php

namespace App\Controller;

use App\Service\BunkerManager;
use App\Repository\BunkerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
class HomeController extends AbstractController
{

    public function __construct(private BunkerManager $bunkerManager)
{
}

    #[Route('/', name: 'app_home')]
    public function index(BunkerManager $bunkerManager): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
