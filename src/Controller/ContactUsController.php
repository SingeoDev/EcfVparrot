<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactUsController extends AbstractController
{
    #[Route('/contact/us', name: 'app_contact_us')]
    public function index(Request $request, EntityManagerInterface $em): Response // add AU LIEU DE INDEX //
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contact);
            $em->flush();
        }

        if ($request->isXmlHttpRequest()) {
            if ($form->isSubmitted() && !$form->isValid()) {
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                }

                return new JsonResponse([
                    'success' => false,
                    'content' => $this->renderView('contact_us/viewcontact.html.twig', [
                     'form' => $form->createView(),
                    ]),
                ]);
            }

            return new JsonResponse([
                'success' => true,
                'UrlRedirect' => $this->generateUrl('app_contact_us'),
            ]);
        }

        return $this->render('contact_us/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}