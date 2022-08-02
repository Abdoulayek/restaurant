<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use App\Form\ReservationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/reservation', name: 'app_reservation')]
    public function reservation(Request $request, EntityManagerInterface $entityManager, RestaurantRepository $restau): Response
    {
        $reservation = new Restaurant();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            
            $entityManager->persist($reservation);
            $entityManager->flush();

          
            
            $this->addFlash('success', 'Votre réservation a été effectué !');
  
        }

       
        return $this->render('home/reservation.html.twig', [
            'reservationForm' => $form -> createView(),
            'products' => $restau->findAll(),
        ]);
    }

  
    
    #[Route('/menu', name: 'app_menu')]
    public function menu(): Response
    {
        return $this->render('home/menu.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
