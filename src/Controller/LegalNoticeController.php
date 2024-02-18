<?php

namespace App\Controller;

use App\Repository\LegalNoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalNoticeController extends AbstractController
{
    #[Route('/legal/notice', name: 'app_legal_notice')]
    public function index(LegalNoticeRepository $repoLegalNotice): Response
    {

        $legalNotice = $repoLegalNotice->findOneBy([]);

        return $this->render('legal_notice/index.html.twig', [
            'legalNotice' => $legalNotice
        ]);
    }
}
