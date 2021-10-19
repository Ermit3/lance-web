<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    #[Route('/about-us', name: 'about_us')]
    public function about_us(): Response
    {
        return $this->render('pages/about_us.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
