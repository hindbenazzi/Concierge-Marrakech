<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\VIPTrips;
use App\Repository\VIPTripsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\RequetePersonalisable;
use App\Entity\RequetePersonalisableRepository;
use App\Entity\TripImages;
use App\Repository\TripImagesRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;

class VipTripsController extends AbstractController
{
    /**
     * @Route("/vip_trips", name="app_vipTrips")
     */
    public function index(EntityManagerInterface $em)
    {
        $repo3=$em->getRepository(VIPTrips::class);
        $Trips= $repo3->findAll();
        return $this->render('vip_trips/index.html.twig', [
            'Trips'=>$Trips
        ]);
    }
    /**
     * @Route("/vip_trips/{TripName}", name="Trips_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $TripName,Request $request,\Swift_Mailer $mailer)
    {
        
        $repo=$em->getRepository(VIPTrips::class);
        $Trip= $repo->findOneBy(array('TripName'=>$TripName));
        $TripId=$Trip->getId();
        $repo1=$em->getRepository(TripImages::class);
        $TripImages=$repo1->findBy(array('TripId'=>$TripId));
        $req=new RequetePersonalisable();
        $form = $this->createFormBuilder($req)
                     ->add('Full_Name', TextType::class)
                     ->add('Telephone', TextType::class)
                     ->add('Email', TextType::class)
                     ->add('StartingON', DateTimeType::class, [
                      'time_label' => 'From'
                  ])
                  ->add('FinishingON', DateTimeType::class, [
                      'time_label' => 'To'
                  ])
                     ->add('message', TextareaType::class)
                     ->add('Send_Request', SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $req->setTripId($Trip);
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('hindouxa.hida@gmail.com')
          ->setTo('hindb788@gmail.com')
          ->setBody( $this->renderView(
            'vip_trips/email.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail()
            ,'message' => $req->getMessage(),'Trip'=>$req->getTripId()->getTripName(),
            'Du'=>date_format($req->getStartingON(),"Y/m/d H:i:s"),'until'=>date_format($req->getFinishingON(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
           $this->addFlash(
               'info',
               'Reserved Successfuly'
           );
          return $this->RedirectToRoute("app_vipTrips");
                     }
        return $this->render('vip_trips/Trip.html.twig', [
            'TripImages' => $TripImages,'Trip' => $Trip,
            'form' => $form->createView()
        ]);
    }
}
