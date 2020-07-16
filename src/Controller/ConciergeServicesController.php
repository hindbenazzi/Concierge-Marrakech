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
    public function GoToReservation(EntityManagerInterface $em, $Servicename,Request $request, \Swift_Mailer $mailer)
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
          $message = (new \Swift_Message('Hello Email'))
          ->setFrom('hindouxa.hida@gmail.com')
          ->setTo('hindb788@gmail.com')
          ->setBody( $this->renderView(
            'concierge_services/email.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail()
            ,'SpecialRequirements' => $req->getSpecialRequirements(),'nbrperson'=>$req->getNumberPersons(),'Service'=>$req->getService()->getTitle(),
            'Du'=>date_format($req->getStartDate(),"Y/m/d H:i:s"),'until'=>date_format($req->getEndDate(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
           $this->addFlash(
               'info',
               'Reserved Successfuly'
           );
          return $this->RedirectToRoute("concierge_services");
                     }
        return $this->render('concierge_services/Reservation.html.twig', [
            'Service' => $Service,'form' => $form->createView()
        ]);

    }
}
