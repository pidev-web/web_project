<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product.html.twig');
    }
}