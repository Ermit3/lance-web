<?php

namespace App\Controller\Sites\Patisserie;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/preview/SITE-XYZ-1', name: 'patisserie_home')]
    public function index(): Response
    {
        return $this->render('sites/patisserie/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
