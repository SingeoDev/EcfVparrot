<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Contact;
use App\Entity\Vehicles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardEmployeesController extends AbstractDashboardController
{
    #[Route('/employees', name: 'employees')]
    public function index(): Response
    {
        return $this->render('admin/dashboard-admin.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ParrotGarage');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('vehicules', 'fas fa-list', Vehicles::class);
        yield MenuItem::linkToCrud('commentaires', 'fas fa-list', Comment::class);
        yield MenuItem::linkToCrud('contact', 'fas fa-list', Contact::class);
        yield MenuItem::linkToRoute('Retour au site', 'fa-solid fa-globe', 'app_home');
        
    }
}
