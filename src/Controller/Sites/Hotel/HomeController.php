<?php

namespace App\Controller\Sites\Hotel;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/preview/SITE-XYZ-3', name: 'sites_hotel_home')]
    public function index(): Response
    {
        return $this->render('sites/hotel/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
