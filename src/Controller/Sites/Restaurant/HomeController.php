<?php

namespace App\Controller\Sites\Restaurant;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/preview/SITE-XYZ-2', name: 'sites_restaurant_home')]
    public function index(): Response
    {
        return $this->render('sites/restaurant/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
