<?php

namespace App\Controller;

use App\Repository\PrivacyPolicyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyPolicyController extends AbstractController
{
    #[Route('/privacy/policy', name: 'app_privacy_policy')]
    public function index(PrivacyPolicyRepository $repoPrivacyPolicy): Response
    {

        $privacyPolicy = $repoPrivacyPolicy->findOneBy([]);

        return $this->render('privacy_policy/index.html.twig', [
            'privacyPolicy' => $privacyPolicy
        ]);
    }
}
