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
use App\Entity\VIPTripsAR;
use App\Entity\VIPTripsFR;
use App\Repository\TripImagesRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class VipTripsController extends AbstractController
{
    /**
     * @Route("/vip_trips", name="app_vipTrips")
     */
    public function index(EntityManagerInterface $em,Request $request)
    {
        $repo3=$em->getRepository(VIPTrips::class);
        $Trips= $repo3->findAll();
        $TripTo=array();
        $TripName=array();
        $TripPlanning=array();
        $TripDesc=array();
        foreach($Trips as $key => $value){
            $TripTo[$key]=$value->getTripName();
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
            $repo1=$em->getRepository(VIPTripsFR::class);
            $TripsFR= $repo1->findAll();
            foreach($TripsFR as $key=>$value){
                $TripName[$key]=$value->getTripName();
                $TripPlanning[$key]=$value->getPackPlanning();
                $TripDesc[$key]=$value->getTripDescription();
    
            }
            foreach($TripsFR as $key => $value){
                $TripTo[$key]=$value->getTripName();
            }
            }elseif($lang=='ar'){
                $repo1=$em->getRepository(VIPTripsAR::class);
                $TripsAR= $repo1->findAll();
                foreach($TripsAR as $key=>$value){
                    $TripName[$key]=$value->getTripName();
                    $TripPlanning[$key]=$value->getPackPlanning();
                    $TripDesc[$key]=$value->getTripDescription();
        
                }
                $repo2=$em->getRepository(VIPTrips::class);
                $Trips= $repo2->findAll();
                foreach($Trips as $key => $value){
                    $TripTo[$key]=$value->getTripName();
                }
        
                }
            else{
                $repo1=$em->getRepository(VIPTrips::class);
                $Trips= $repo1->findAll();
                foreach($Trips as $key=>$value){
                    $TripName[$key]=$value->getTripName();
                    $TripPlanning[$key]=$value->getPackPlanning();
                    $TripDesc[$key]=$value->getTripDescription();
        
                }
                foreach($Trips as $key => $value){
                    $TripTo[$key]=$value->getTripName();
                }
    
            }
        return $this->render('vip_trips/index.html.twig', [
            'Trips'=>$Trips,'TripTo'=>$TripTo,'TripName'=>$TripName,'TripPlanning'=>$TripPlanning,
            'TripDesc'=>$TripDesc
        ]);
    }
    /**
     * @Route("/vip_trips/{TripName}", name="Trips_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $TripName,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo=$em->getRepository(VIPTripsFR::class);
        $Trip= $repo->findOneBy(array('TripName'=>$TripName));
        $repo2=$em->getRepository(VIPTrips::class);
        $TripEN= $repo2->findOneBy(array('id'=>$Trip->getId()));
        $TripId=$TripEN->getId();
        $VTripName=$Trip->getTripName();
        $TripPlanning=$Trip->getPackPlanning();
        $TripDesc=$Trip->getTripDescription();
        }elseif($lang=='ar'){
            $repo=$em->getRepository(VIPTrips::class);
            $TripEN= $repo->findOneBy(array('TripName'=>$TripName));
            $repo2=$em->getRepository(VIPTripsAR::class);
            $Trip= $repo2->findOneBy(array('id'=>$TripEN->getId()));
            $TripId=$TripEN->getId();
            $VTripName=$Trip->getTripName();
            $TripPlanning=$Trip->getPackPlanning();
            $TripDesc=$Trip->getTripDescription();
            }
        else{
        $repo=$em->getRepository(VIPTrips::class);
        $TripEN= $repo->findOneBy(array('TripName'=>$TripName));
        $TripId=$TripEN->getId();
        $VTripName=$TripEN->getTripName();
        $TripPlanning=$TripEN->getPackPlanning();
        $TripDesc=$TripEN->getTripDescription();
        }
        $repo1=$em->getRepository(TripImages::class);
        $TripImages=$repo1->findBy(array('TripId'=>$TripId));
        $req=new RequetePersonalisable();
        $submiMessage=$translator->trans('Send_Request');
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
                     ->add($submiMessage, SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $req->setTripId($TripEN);
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
      $flashMessage=$translator->trans('Reserved Successfuly');
      $this->addFlash(
          'info',
          $flashMessage
      );
          return $this->RedirectToRoute("app_vipTrips");
                     }
        return $this->render('vip_trips/Trip.html.twig', [
            'TripImages' => $TripImages,'Trip' => $TripEN,
            'form' => $form->createView(),'VTripName'=>$VTripName,'TripPlanning'=>$TripPlanning,
            'TripDesc'=>$TripDesc
        ]);
    }
}
