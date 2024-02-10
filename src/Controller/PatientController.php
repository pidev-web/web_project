<?php

namespace App\Controller;
use App\Entity\Patient; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatientController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    #[Route('/patient', name: 'app_patient')]
    public function index():Response
    {
        return $this->render('patient.html.twig');
    }
}
