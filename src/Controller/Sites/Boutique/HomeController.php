<?php

namespace App\Controller\Sites\Boutique;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/preview/SITE-XYZ-5', name: 'sites_boutique_home')]
    public function index(): Response
    {
        return $this->render('sites/boutique/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/preview/SITE-XYZ-5/product', name: 'sites_boutique_view')]
    public function view(): Response
    {
        return $this->render('sites/boutique/product/product_view.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
