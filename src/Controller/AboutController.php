<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends AbstractController
{
    /**
     * @Route("/a-propos")
     */
    
    public function index(): Response
    {
        return $this->render('about.html.twig', []);
    }
}

?>