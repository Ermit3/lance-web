<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RealisationController extends AbstractController
{
    #[Route('/realisation', name: 'realisation')]
    public function realisation(): Response
    {
        return $this->render('pages/realisation.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
