<?php

namespace App\Controller;

use App\Entity\Bunker;
use App\Form\BunkerType;
use App\Repository\BunkerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
#[Route('/bunker')]
class BunkerController extends AbstractController
{
     #[IsGranted('ROLE_ADMIN')]
     #[Route('/', name: 'app_bunker_index', methods: ['GET'])]
    public function index(BunkerRepository $bunkerRepository): Response
    {
        return $this->render('bunker/index.html.twig', [
            'bunkers' => $bunkerRepository->findAll(),
        ]);
    } 

    #[Route('/new', name: 'app_bunker_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BunkerRepository $bunkerRepository): Response
    {
        $bunker = new Bunker();
        $form = $this->createForm(BunkerType::class, $bunker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bunkerRepository->save($bunker, true);

            return $this->redirectToRoute('app_bunker_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bunker/new.html.twig', [
            'bunker' => $bunker,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/home', name: 'app_bunker_show', methods: ['GET'])]
    public function show(Bunker $bunker): Response
    {
        return $this->render('home/index.html.twig.html.twig', [
            'bunker' => $bunker,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bunker_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bunker $bunker, BunkerRepository $bunkerRepository): Response
    {
        $form = $this->createForm(BunkerType::class, $bunker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bunkerRepository->save($bunker, true);

            return $this->redirectToRoute('app_bunker_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bunker/edit.html.twig', [
            'bunker' => $bunker,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bunker_delete', methods: ['POST'])]
    public function delete(Request $request, Bunker $bunker, BunkerRepository $bunkerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bunker->getId(), $request->request->get('_token'))) {
            $bunkerRepository->remove($bunker, true);
        }

        return $this->redirectToRoute('app_bunker_index', [], Response::HTTP_SEE_OTHER);
    }
}
