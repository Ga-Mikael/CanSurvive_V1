<?php

namespace App\Controller;

use App\Entity\Can;
use App\Form\CanType;
use App\Repository\CanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/can')]
class CanController extends AbstractController
{
    #[Route('/', name: 'app_can_index', methods: ['GET'])]
    public function index(CanRepository $canRepository): Response
    {
        return $this->render('can/index.html.twig', [
            'cans' => $canRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_can_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CanRepository $canRepository): Response
    {
        $can = new Can();
        $form = $this->createForm(CanType::class, $can);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $canRepository->save($can, true);

            return $this->redirectToRoute('app_can_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('can/new.html.twig', [
            'can' => $can,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_can_show', methods: ['GET'])]
    public function show(Can $can): Response
    {
        return $this->render('can/show.html.twig', [
            'can' => $can,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_can_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Can $can, CanRepository $canRepository): Response
    {
        $form = $this->createForm(CanType::class, $can);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $canRepository->save($can, true);

            return $this->redirectToRoute('app_can_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('can/edit.html.twig', [
            'can' => $can,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_can_delete', methods: ['POST'])]
    public function delete(Request $request, Can $can, CanRepository $canRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$can->getId(), $request->request->get('_token'))) {
            $canRepository->remove($can, true);
        }

        return $this->redirectToRoute('app_can_index', [], Response::HTTP_SEE_OTHER);
    }
}
