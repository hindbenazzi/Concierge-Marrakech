<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\LuxuryCars;
use App\Entity\CarsImages;
use App\Entity\Partners;
use App\Entity\RequetePersonalisable;
use App\Entity\RequetePersonalisableRepository;
use App\Repository\CarsImagesRepository;
use App\Repository\LuxuryCarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;

class LuxuryCarsController extends AbstractController
{
    /**
     * @Route("/luxury_cars", name="app_luxuryCars")
     */
    public function luxury_cars(EntityManagerInterface $em)
    {
        $repo3=$em->getRepository(LuxuryCars::class);
        $images= $repo3->findAll();
        foreach($images as $key=>$value){
            $value->setCarsImg(base64_encode(stream_get_contents($value->getCarsImg())));
        }

        return $this->render('luxury_cars/index.html.twig',array('images'=>$images));
    }
    
      /**
     * @Route("/luxury_cars/{Resname}", name="luxury_cars_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $Resname,Request $request,\Swift_Mailer $mailer)
    {
        
        $repo6=$em->getRepository(LuxuryCars::class);
        $cars= $repo6->findOneBy(array('title'=>$Resname));
        $CarId=$cars->getId();
        $repo4=$em->getRepository(CarsImages::class);
        $CarsImages=$repo4->findBy(array('CarsId'=> $CarId));
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
          $req->setCarId( $cars);
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('hindouxa.hida@gmail.com')
          ->setTo('hindb788@gmail.com')
          ->setBody( $this->renderView(
            'luxury_cars/email.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail()
            ,'message' => $req->getMessage(),'Car'=>$req->getCarId()->getTitle(),
            'Du'=>date_format($req->getStartingON(),"Y/m/d H:i:s"),'until'=>date_format($req->getFinishingON(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
           $this->addFlash(
               'info',
               'Reserved Successfuly'
           );
          return $this->RedirectToRoute("app_luxuryCars");
                     }
        return $this->render('luxury_cars/cars.html.twig', [
            'CarsImages' => $CarsImages,'Cars' => $cars,
            'form' => $form->createView()
        ]);
    }
}
