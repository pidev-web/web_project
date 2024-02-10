<?php

namespace App\Controller;
use App\Entity\Appointment; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppointmentController extends AbstractController
{
    #[Route('/appointment', name: 'app_appointment')]
    public function index(): Response
    {
        return $this->render('appointment.html.twig');
    }
}
