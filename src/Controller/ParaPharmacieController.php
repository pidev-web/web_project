<?php

namespace App\Controller;

use App\Entity\ParaPharmacie;
use App\Form\ParaPharmacieType;
use App\Repository\ParaPharmacieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/para/pharmacie')]
class ParaPharmacieController extends AbstractController
{
    #[Route('/', name: 'app_para_pharmacie_index', methods: ['GET'])]
    public function index(ParaPharmacieRepository $paraPharmacieRepository): Response
    {
        return $this->render('para_pharmacie/index.html.twig', [
            'para_pharmacies' => $paraPharmacieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_para_pharmacie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $paraPharmacie = new ParaPharmacie();
        $form = $this->createForm(ParaPharmacieType::class, $paraPharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($paraPharmacie);
            $entityManager->flush();

            return $this->redirectToRoute('app_para_pharmacie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('para_pharmacie/new.html.twig', [
            'para_pharmacie' => $paraPharmacie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_para_pharmacie_show', methods: ['GET'])]
    public function show(ParaPharmacie $paraPharmacie): Response
    {
        return $this->render('para_pharmacie/show.html.twig', [
            'para_pharmacie' => $paraPharmacie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_para_pharmacie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ParaPharmacie $paraPharmacie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParaPharmacieType::class, $paraPharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_para_pharmacie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('para_pharmacie/edit.html.twig', [
            'para_pharmacie' => $paraPharmacie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_para_pharmacie_delete', methods: ['POST'])]
    public function delete(Request $request, ParaPharmacie $paraPharmacie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paraPharmacie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($paraPharmacie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_para_pharmacie_index', [], Response::HTTP_SEE_OTHER);
    }
}
