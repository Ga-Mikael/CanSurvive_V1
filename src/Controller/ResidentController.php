<?php

namespace App\Controller;

use App\Entity\Resident;
use App\Form\ResidentType;
use App\Repository\ResidentRepository;
use App\Service\BunkerManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
#[Route('/resident')]
class ResidentController extends AbstractController
{
    #[Route('/', name: 'app_resident_index', methods: ['GET'])]
    public function index(ResidentRepository $residentRepository, BunkerManager $bunkerManager): Response
    {
            

        return $this->render('resident/index.html.twig', [
            'residents' => $residentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_resident_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ResidentRepository $residentRepository): Response
    {
        $resident = new Resident();
        $form = $this->createForm(ResidentType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $residentRepository->save($resident, true);

            return $this->redirectToRoute('app_resident_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('resident/new.html.twig', [
            'resident' => $resident,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_resident_show', methods: ['GET'])]
    public function show(Resident $resident): Response
    {
        return $this->render('resident/show.html.twig', [
            'resident' => $resident,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_resident_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Resident $resident, ResidentRepository $residentRepository): Response
    {
        $form = $this->createForm(ResidentType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $residentRepository->save($resident, true);

            return $this->redirectToRoute('app_resident_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('resident/edit.html.twig', [
            'resident' => $resident,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_resident_delete', methods: ['POST'])]
    public function delete(Request $request, Resident $resident, ResidentRepository $residentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resident->getId(), $request->request->get('_token'))) {
            $residentRepository->remove($resident, true);
        }

        return $this->redirectToRoute('app_resident_index', [], Response::HTTP_SEE_OTHER);
    }
}
