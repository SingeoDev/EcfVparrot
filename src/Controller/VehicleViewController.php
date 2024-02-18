<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactAboutType;
use App\Repository\VehiclesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VehicleViewController extends AbstractController
{
    // Nouvelle route pour la page de détail d'un véhicule

    #[Route('/vehicle/{id}', name: 'app_vehicle_view')]
    public function view(VehiclesRepository $repoVehicles, $id, Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();
        $vehicle = $repoVehicles->find($id);

        $form = $this->createForm(ContactAboutType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $price = $vehicle->getprice();

            $contactString = 'n° ' . $id . ' - ' . $repoVehicles->find($id)->getName() . ' - ' . $price . ' €';
            if (strlen($contactString) > 255) {
                $contactString = substr($contactString, 0, 255);
            }
            $em->persist($contact);
            $em->flush();
        }

        if ($request->isXmlHttpRequest()) {
            if ($form->isSubmitted() && !$form->isValid()) {
                
                return new JsonResponse([
                    'success' => false,
                    'content' => $this->renderView('vehicles/contactAboutVehicle.html.twig', [  
                        'form' => $form->createView(),
                        'vehicle' => $vehicle,
                    ]),
                ]);
            }

            return new JsonResponse([
                'success' => true,
                'UrlRedirect' => $this->generateUrl('app_vehicle_view', ['id' => $id]),
            ]);
        }

        return $this->render('vehicles/imagegallery.html.twig', [
            'form' => $form->createView(),
            'vehicle' => $vehicle,
        ]);
    }
}