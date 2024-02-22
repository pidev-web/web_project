<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/patient')]
class PatientController extends AbstractController
{
    #[Route('/', name: 'app_patient_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('patient/index.html.twig');
    }
    #[Route('/espace/{id}', name: 'app_patient_espace', methods: ['GET'])]
    public function espace($id): Response
    {
        return $this->render('patient/espace.html.twig', ['id' => $id]);
    }
    #[Route('/list', name: 'app_patient_list', methods: ['GET'])]
    public function list(PatientRepository $patientRepository): Response
    {
        return $this->render('patient/listes.html.twig', [
            'patients' => $patientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_patient_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();
            return $this->render(
                'patient/espace.html.twig',
            );
        }
        return $this->render('patient/new.html.twig', [
            'patient' => $patient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_patient_show', methods: ['GET'])]
    public function show(Patient $patient): Response
    {
        return $this->render('patient/show.html.twig', [
            'patient' => $patient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_patient_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, int $id, PatientRepository $rep): Response
    {
        $patient = $rep->find($id);
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();
            return $this->redirectToRoute('app_patient_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('patient/edit.html.twig', [
            'patient' => $patient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_patient_delete', methods: ['POST'])]
    public function delete(EntityManagerInterface $entityManager, PatientRepository $rep, $id): Response
    {
        $patient = $rep->find($id);
        $entityManager->remove($patient);
        $entityManager->flush();
        return $this->redirectToRoute('app_patient_list', [], Response::HTTP_SEE_OTHER);
    }



    #---------------------------------ADMIN--------------------------------



    #[Route('/admin', name: 'app_patient_list_admin', methods: ['GET'])]
    public function indexAdmin(PatientRepository $patientRepository): Response
    {
        return $this->render('admin_patient/dashboard__tables.html.twig', [
            'patients' => $patientRepository->findAll(),
        ]);
    }

    #[Route('/admin/new', name: 'app_patient_new_admin', methods: ['GET', 'POST'])]
    public function newPatient(Request $request, EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();

            return $this->redirectToRoute('app_patient_list_admin', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('admin_patient/dashboard__new_patient.html.twig', [
            'patient' => $patient,
            'form' => $form,
        ]);
    }

    #[Route('/admin/{id}', name: 'app_patient_show_admin', methods: ['GET'])]
    public function showPatient(Patient $patient): Response
    {
        return $this->render('admin_patient/dashboard__show__patient.html.twig', [
            'patient' => $patient,
        ]);
    }

    #[Route('admin/{id}/edit', name: 'app_patient_edit_admin', methods: ['GET', 'POST'])]
    public function editAdmin(Request $request, EntityManagerInterface $entityManager, int $id, PatientRepository $rep): Response
    {
        $patient = $rep->find($id);
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();
            return $this->redirectToRoute('app_patient_list_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_patient/dashboard__update__patient.html.twig', [
            'patient' => $patient,
            'form' => $form,
        ]);
    }

    #[Route('admin/{id}', name: 'app_patient_delete_admin', methods: ['POST'])]
    public function deletePatient(EntityManagerInterface $entityManager, PatientRepository $rep, $id): Response
    {
        $patient = $rep->find($id);
        $entityManager->remove($patient);
        $entityManager->flush();
        return $this->redirectToRoute('app_patient_list_admin', [], Response::HTTP_SEE_OTHER);
    }
}
