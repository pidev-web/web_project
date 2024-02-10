<?php

namespace App\Controller;
use App\Entity\Event; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index():Response
    {
        return $this->render('event.html.twig');
    }
}
