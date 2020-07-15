<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ConciergeService;
use App\Repository\ConciergeServiceRepository;
use App\Entity\ConciergeServiceRequete;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;

class ConciergeServicesController extends AbstractController
{
    /**
     * @Route("/concierge_services", name="concierge_services")
     */
    public function index(EntityManagerInterface $em)
    {
        $repo=$em->getRepository(ConciergeService::class);
        $Services=$repo->findAll();

        return $this->render('concierge_services/index.html.twig', [
            'Services' => $Services,
        ]);
    }
    /**
     * @Route("/concierge_services/{Servicename}", name="concierge_services_reservation")
     */
    public function GoToReservation(EntityManagerInterface $em, $Servicename,Request $request)
    {
      
        $repo=$em->getRepository(ConciergeService::class);
        $Service= $repo->findOneBy(array('title'=>$Servicename));
        $req=new ConciergeServiceRequete();
        $form = $this->createFormBuilder($req)
                     ->add('Full_Name', TextType::class)
                     ->add('Telephone', TextType::class)
                     ->add('Email', TextType::class)
                     ->add('NumberPersons', TextType::class)
                     ->add('Start_date', DateTimeType::class, [
                      'time_label' => 'From'
                  ])
                  ->add('End_Date', DateTimeType::class, [
                      'time_label' => 'To'
                  ])
                     ->add('SpecialRequirements', TextareaType::class)
                     ->add('Send_Request', SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $req->setService($Service);
          $em->persist($req);
          $em->flush();
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('concierge_services/Reservation.html.twig', [
            'Service' => $Service,'form' => $form->createView()
        ]);

    }
}
