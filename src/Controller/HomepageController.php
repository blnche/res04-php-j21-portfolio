<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    /**
     * @Route("/")
     */
    
    public function index(): Response
    {
        return $this->render('homepage.html.twig', []);
    }
}

?>