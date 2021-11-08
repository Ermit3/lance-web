<?php

namespace App\Controller\Sites\Pizzeria;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/preview/SITE-XYZ-4', name: 'sites_pizzeria_home')]
    public function index(): Response
    {
        return $this->render('sites/pizzeria/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
