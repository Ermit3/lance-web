<?php

namespace App\Controller\Sites\Tourisme;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/preview/SITE-XYZ-6', name: 'sites_tourisme_home')]
    public function index(): Response
    {
        return $this->render('sites/tourisme/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
