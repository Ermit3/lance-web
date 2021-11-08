<?php

namespace App\Controller;

use App\Entity\ProductType;
use App\Repository\ProductRepository;
use App\Repository\ProductTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProductRepository $productRepository, ProductTypeRepository $productTypeRepository): Response
    {
        $site = $productTypeRepository->findOneBy(['name' => 'Site']);
        $sites = $productRepository->findBy(['productType' => $site]);

        $app = $productTypeRepository->findOneBy(['name' => 'Application']);
        $apps = $productRepository->findBy(['productType' => $app]);

        $logo = $productTypeRepository->findOneBy(['name' => 'Logo']);
        $logos = $productRepository->findBy(['productType' => $logo]);

        $carte = $productTypeRepository->findOneBy(['name' => 'Carte']);
        $cartes = $productRepository->findBy(['productType' => $carte]);


        return $this->render('home_page/index.html.twig', [
            'sites' => $sites,
            'logos' => $logos,
            'applications' => $apps,
            'cartes' => $cartes,
        ]);
    }
}
