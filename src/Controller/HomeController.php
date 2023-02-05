<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
class HomeController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        /**  @var \App\Entity\User */
        $user = $this->getUser();
        $bunker = $user->getBunker();

        return $this->render('home/index.html.twig', [
            'bunker' => $bunker,

        ]);
    }
}
