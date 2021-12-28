<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ReservationRepository $reservationRepository, ReservationRepository $reservation): Response
    {   
        if($this->getUser() == null){
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }else {
            $infos = $this->getUser();
            $name = $infos->getNom();
            $res = $reservation->findByNom($name);
            return $this->render('home/index.html.twig', compact('name', 'res'));
        }

    }

    /**
     * @Route("/voir_plus", name="home_plus")
     */
    public function index_plus(): Response
    {   
        return $this->render('home/voir_plus.html.twig', [
            'controller_name' => 'HomeController',
        ]);

    }
}
