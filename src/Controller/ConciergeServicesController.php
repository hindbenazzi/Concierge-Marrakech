<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ConciergeService;
use App\Entity\ConciergeServiceFR;
use App\Entity\ConciergeServiceAR;
use App\Repository\ConciergeServiceRepository;
use App\Entity\ConciergeServiceRequete;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class ConciergeServicesController extends AbstractController
{
    /**
     * @Route("/concierge_services", name="concierge_services")
     */
    public function index(EntityManagerInterface $em,Request $request)
    {
        $repo=$em->getRepository(ConciergeService::class);
        $ServicesTo=array();
        $Services=$repo->findAll();
        $serviceTitle=array();
        $serviceDescription=array();
        foreach($Services as $key => $value){
            $ServicesTo[$key]=$value->getTitle();
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo2=$em->getRepository(ConciergeServiceFR::class);
        $Servicesfr=$repo2->findAll();
        foreach($Servicesfr as $key => $value){
            $serviceTitle[$key]=$value->getTitle();
            $serviceDescription[$key]=$value->getDescription();
            

        }
        foreach($Servicesfr as $key => $value){
            $ServicesTo[$key]=$value->getTitle();
        }
        }elseif ($lang=='ar') {
        $repo2=$em->getRepository(ConciergeServiceAR::class);
        $Servicesar=$repo2->findAll();
        foreach($Servicesar as $key => $value){
            $serviceTitle[$key]=$value->getTitle();
            $serviceDescription[$key]=$value->getDescription();
            

        }
        }
        else{
            $repo2=$em->getRepository(ConciergeService::class);
        $Servicesar=$repo2->findAll();
        foreach($Servicesar as $key => $value){
            $serviceTitle[$key]=$value->getTitle();
            $serviceDescription[$key]=$value->getDescription();
            

        }
        }
        return $this->render('concierge_services/index.html.twig', [
            'Services' => $Services,'ServicesTo'=>$ServicesTo,
            'serviceTitle'=>$serviceTitle,'serviceDescription'=>$serviceDescription
        ]);
    }
    /**
     * @Route("/concierge_services/{Servicename}", name="concierge_services_reservation")
     */
    public function GoToReservation(EntityManagerInterface $em, $Servicename,Request $request, \Swift_Mailer $mailer, TranslatorInterface $translator)
    {   
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo=$em->getRepository(ConciergeServiceFr::class);
        $Service= $repo->findOneBy(array('title'=>$Servicename));
        $repo1=$em->getRepository(ConciergeService::class);
        $serviceEN=$repo1->findOneBy(array('id'=>$Service->getId()));
        
        }elseif($lang=='ar'){
            $repo1=$em->getRepository(ConciergeService::class);
            $serviceEN=$repo1->findOneBy(array('title'=>$Servicename));
            $repo=$em->getRepository(ConciergeServiceAR::class);
            $Service= $repo->findOneBy(array('id'=>$serviceEN->getId()));
        }
        else{
            $repo=$em->getRepository(ConciergeService::class);
            $Service= $repo->findOneBy(array('title'=>$Servicename));
            $serviceEN= $repo->findOneBy(array('title'=>$Servicename));
        }
        $req=new ConciergeServiceRequete();
        $submiMessage=$translator->trans('Send_Request');
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
                     ->add($submiMessage, SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $req->setService($serviceEN);
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
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
      $flashMessage=$translator->trans('Reserved Successfuly');
           $this->addFlash(
               'info',
               $flashMessage
           );
          return $this->RedirectToRoute("concierge_services");
                     }
        return $this->render('concierge_services/Reservation.html.twig', [
            'Service' => $Service,'form' => $form->createView()
        ]);

    }
}
