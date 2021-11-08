<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product/{reference}', name: 'product')]
    public function index($reference, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['reference' => $reference]);

        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product/{reference}/commande', name: 'product_reference')]
    public function selected($reference, ProductRepository $productRepository, Request $request, EntityManagerInterface $em): Response
    {
        $product = $productRepository->findOneBy(['reference' => $reference]);

        return $this->render('product/reference.html.twig', [
            'product' => $product,
        ]);
    }
}
