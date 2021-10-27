<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReservationRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="reservation_index", methods={"GET"})
     */
    public function index(ReservationRepository $reservationRepository, ReservationRepository $reservation): Response
    {
        $events = $reservation->findAll();
        $rdvs = [];
        foreach($events as $event) {
             $rdvs[] = [
               'id' => $event -> getId(),
               'start' => $event -> getDate() ->format('Y-m-d H:i:s'),
               'end' => $event -> getDate() ->format('Y-m-d H:i:s'),
               'title' => $event -> getNom(),
               'phone' => $event -> getPhone(),
             ];
        }
        $data = json_encode($rdvs);
        return $this->render('reservation/index.html.twig', compact('data'));
    }

}
