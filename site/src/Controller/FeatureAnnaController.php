<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeatureAnnaController extends AbstractController
{
    /**
     * @Route("/Anna", name="featureAnna", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('Confidentialite/conf.html.twig');
    }
}