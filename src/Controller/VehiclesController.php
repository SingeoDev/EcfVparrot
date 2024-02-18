<?php

namespace App\Controller;

use App\Repository\VehiclesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VehiclesController extends AbstractController
{
    #[Route('/vehicles', name: 'app_vehicles')]
    public function index(VehiclesRepository $repoVehicles, Request $request, SessionInterface $session): Response {

        $vehicleMinPrice = $repoVehicles->findBy([], ['price' => 'ASC'], 1);
        if ($vehicleMinPrice == null) {
            $valueMinPrice = 0;
        } else {
            $valueMinPrice = $vehicleMinPrice[0]->getPrice();
        }

        $vehicleMaxPrice = $repoVehicles->findBy([], ['price' => 'DESC'], 1);
        if ($vehicleMaxPrice == null) {
            $valueMaxPrice = 0;
        } else {
            $valueMaxPrice = $vehicleMaxPrice[0]->getPrice();
        }

        $vehicleMinYear = $repoVehicles->findBy([], ['years' => 'ASC'], 1);
        if ($vehicleMinYear == null) {
            $valueMinYear = 0;
        } else {
            $valueMinYear = $vehicleMinYear[0]->getYears()->format('Y');
        }

        $vehicleMaxYear = $repoVehicles->findBy([], ['years' => 'DESC'], 1);
        if ($vehicleMaxYear == null) {
            $valueMaxYear = 0;
        } else {
            $valueMaxYear = $vehicleMaxYear[0]->getYears()->format('Y');
        }

        $vehicleMinKm = $repoVehicles->findBy([], ['mileage' => 'ASC'], 1);
        if ($vehicleMinKm == null) {
            $valueMinKm = 0;
        } else {
            $valueMinKm = $vehicleMinKm[0]->getMileage();
        }
        
        $vehicleMaxKm = $repoVehicles->findBy([], ['mileage' => 'DESC'], 1);
        if ($vehicleMaxKm == null) {
            $valueMaxKm = 0;
        } else {
            $valueMaxKm = $vehicleMaxKm[0]->getMileage();
        }


        if ($request->isXmlHttpRequest()) {
            $priceMin = $request->get("priceMin");
            $priceMax = $request->get("priceMax");
            $kmMin = $request->get("kmMin");
            $kmMax = $request->get("kmMax");
            $yearMin = $request->get("yearMin");
            $yearMax = $request->get("yearMax");

            $vehicles = $repoVehicles->getVehiclesFilters($priceMin, $priceMax, $kmMin, $kmMax, $yearMin, $yearMax);
            return new JsonResponse([
                'content' => $this->renderView('vehicles/viewvehicles.html.twig', compact('vehicles')),
            ]);
        }

        $vehicles = $repoVehicles->findBy([], ['price' => 'ASC']);
        return $this->render('vehicles/index.html.twig',
            compact('vehicles', 'valueMinPrice', 'valueMaxPrice', 
            'valueMinYear', 'valueMaxYear', 
            'valueMinKm', 'valueMaxKm')
        );
    }
}