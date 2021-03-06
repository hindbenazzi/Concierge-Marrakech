<?php

namespace App\Controller;

use App\Entity\DriversOnCallRequete;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MarrakechNightRequete;
use App\Entity\PrivateEventsRequete;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class HomePageServicesController extends AbstractController
{
    /**
     * @Route("/Marrakech-by-night", name="Marrakech-by-night")
     */
    public function MarrakechNight(EntityManagerInterface $em,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $req=new MarrakechNightRequete();
        $submiMessage=$translator->trans('Send_Request');
        $transpLabel=$translator->trans('yes, I also want transport to and from the place');
        $form = $this->createFormBuilder($req)
                     ->add('Full_Name', TextType::class)
                     ->add('Telephone', TextType::class)
                     ->add('Email', TextType::class)
                     ->add('ReservationPlace', TextType::class)
                     ->add('NumberOfPersons', TextType::class)
                     ->add('Transport', CheckboxType::class,[
                         'label'    => $transpLabel,'required' => false,])
                     ->add('StartDate', DateTimeType::class, [
                      'time_label' => 'From'
                  ])
                  ->add('EndDate', DateTimeType::class, [
                      'time_label' => 'To'
                  ])
                     ->add('Message', TextareaType::class)
                     ->add($submiMessage, SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($req->getTransport()==true){
              $trans="avec transport";
            }else{
                $trans="sans transport";
            }
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('useremail@concierge-marrakech.ma')
          ->setTo('contact@concierge-marrakech.ma')
          ->setBody( $this->renderView(
            'home_page_services/MarrakechNightsEmail.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail(),'Transport' =>$trans
            ,'reservation'=>$req->getReservationPlace(),'message' => $req->getMessage(), 'Du'=>date_format($req->getStartDate(),"Y/m/d H:i:s"),
            'until'=>date_format($req->getEndDate(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
      $flashMessage=$translator->trans('Reserved Successfuly');
      $this->addFlash(
          'info',
          $flashMessage
      );
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('home_page_services/MarrakechByNight.html.twig',['form' => $form->createView()]);
    }
    /**
     * @Route("/Drivers-on-call", name="Drivers-on-call")
     */
    public function DriversOnCall(EntityManagerInterface $em,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $req=new DriversOnCallRequete();
        $submiMessage=$translator->trans('Send_Request');
       
        $form = $this->createFormBuilder($req)
                     ->add('Full_Name', TextType::class)
                     ->add('Telephone', TextType::class)
                     ->add('Email', TextType::class)
                     ->add('VehiculeType', TextType::class)
                     ->add('NumberOfPerson', TextType::class)
                     ->add('ArrivalPlace', TextType::class)
                     ->add('language', TextType::class)
                     ->add('StartDate', DateTimeType::class, [
                      'time_label' => 'From'
                  ])
                  ->add('EndDate', DateTimeType::class, [
                      'time_label' => 'To'
                  ])
                     ->add('Message', TextareaType::class)
                     ->add($submiMessage, SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('useremail@concierge-marrakech.ma')
          ->setTo('contact@concierge-marrakech.ma')
          ->setBody( $this->renderView(
            'home_page_services/DriversOnCallEmail.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail(),'VehiculeType' =>$trans
            ,'ArrivalPlace'=>$req->getArrivalPlace(),'language'=>$req->getLanguage(),'message' => $req->getMessage(), 'Du'=>date_format($req->getStartDate(),"Y/m/d H:i:s"),
            'until'=>date_format($req->getEndDate(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
      $flashMessage=$translator->trans('Reserved Successfuly');
      $this->addFlash(
          'info',
          $flashMessage
      );
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('home_page_services/DriversOnCall.html.twig',['form' => $form->createView()]);
    }

    
    /**
     * @Route("/Private-events", name="Private-events")
     */
    public function PrivateEvents(EntityManagerInterface $em,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $req=new PrivateEventsRequete();
        $submiMessage=$translator->trans('Send_Request');
        $transpLabel=$translator->trans('I also want the special events transport for my event');
        $form = $this->createFormBuilder($req)
                     ->add('Full_Name', TextType::class)
                     ->add('Telephone', TextType::class)
                     ->add('Email', TextType::class)
                     ->add('ServiceType', TextType::class)
                     ->add('NumberOfPersons', TextType::class)
                     ->add('Transport', CheckboxType::class,[
                         'label'    => $transpLabel,'required' => false,])
                     ->add('StartDate', DateTimeType::class, [
                      'time_label' => 'From'
                  ])
                  ->add('EndDate', DateTimeType::class, [
                      'time_label' => 'To'
                  ])
                     ->add('Message', TextareaType::class)
                     ->add($submiMessage, SubmitType::class)
                     ->getForm();
                     $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($req->getTransport()==true){
              $trans="avec transport";
            }else{
                $trans="sans transport";
            }
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('useremail@concierge-marrakech.ma')
          ->setTo('contact@concierge-marrakech.ma')
          ->setBody( $this->renderView(
            'home_page_services/PrivateEventsEmail.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail(),'Transport' =>$trans
            ,'service'=>$req->getServiceType(),'message' => $req->getMessage(), 'Du'=>date_format($req->getStartDate(),"Y/m/d H:i:s"),
            'until'=>date_format($req->getEndDate(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
      $flashMessage=$translator->trans('Reserved Successfuly');
      $this->addFlash(
          'info',
          $flashMessage
      );
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('home_page_services/PrivateEvents.html.twig',['form' => $form->createView()]);
    }
}
