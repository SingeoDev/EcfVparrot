<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\OpenDay;
use App\Entity\Comment;
use App\Entity\Contact;
use App\Entity\LegalNotice;
use App\Entity\PrivacyPolicy;
use App\Entity\Services;
use App\Entity\Vehicles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
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
        yield MenuItem::linkToCrud('services', 'fas fa-list', Services::class);
        yield MenuItem::linkToCrud('vehicules', 'fas fa-list', Vehicles::class);
        yield MenuItem::linkToCrud('commentaires', 'fas fa-list', Comment::class);
        yield MenuItem::linkToCrud('politique de confidentialité', 'fas fa-list', PrivacyPolicy::class);
        yield MenuItem::linkToCrud('Mention Legal', 'fas fa-list', LegalNotice::class);
        yield MenuItem::linkToCrud('contact', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-list', OpenDay::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToRoute('Retour au site', 'fa-solid fa-globe', 'app_home');
        
    }
}
