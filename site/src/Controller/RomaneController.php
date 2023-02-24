<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RomaneController extends AbstractController
{
    /**
     * @Route("/Romane", name="romane", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('romane/romanetest.html.twig');
    }
}