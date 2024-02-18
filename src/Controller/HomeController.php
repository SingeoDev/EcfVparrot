<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]


    public function index(ServicesRepository $repoServices): Response
    {
        $services = $repoServices->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'services' => $services,
        ]);
    }
}
