<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function selected($reference, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['reference' => $reference]);

        return $this->render('product/reference.html.twig', [
            'product' => $product,
        ]);
    }
}
