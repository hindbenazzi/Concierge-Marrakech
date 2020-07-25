<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\LuxuryCars;
use App\Entity\LuxuryCarsFR;
use App\Entity\CarsImages;
use App\Entity\LuxuryCarsAR;
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
use Symfony\Contracts\Translation\TranslatorInterface;

class LuxuryCarsController extends AbstractController
{
    /**
     * @Route("/luxury_cars", name="app_luxuryCars")
     */
    public function luxury_cars(EntityManagerInterface $em,Request $request)
    {
        $repo3=$em->getRepository(LuxuryCars::class);
        $images= $repo3->findAll();
        $CarsTitle=array();
        $CarsTitleTO=array();
        $CarsDescription=array();
        foreach($images as $key => $value){
            $CarsTitleTo[$key]=$value->getTitle();
        }
        foreach($images as $key=>$value){
            $value->setCarsImg(base64_encode(stream_get_contents($value->getCarsImg())));
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
            $repo4=$em->getRepository(LuxuryCarsFR::class);
            $imagesFR= $repo4->findAll();
            foreach($imagesFR as $key => $value){
                $CarsTitle[$key]=$value->getTitle();
                $CarsTitleTO[$key]=$value->getTitle();
                $CarsDescription[$key]=$value->getCarsDesc();
            }
        }elseif($lang=='ar'){
            $repo4=$em->getRepository(LuxuryCarsAR::class);
            $imagesAR= $repo4->findAll();
            foreach($imagesAR as $key => $value){
                $CarsTitle[$key]=$value->getTitle();
                $CarsDescription[$key]=$value->getCarsDesc();
            }
            $repo5=$em->getRepository(LuxuryCars::class);
            $imagesen= $repo5->findAll();
            foreach($imagesen as $key => $value){
                
                $CarsTitleTO[$key]=$value->getTitle();
                
            }
        }
        else {
            $repo4=$em->getRepository(LuxuryCars::class);
            $imagesFR= $repo4->findAll();
            foreach($imagesFR as $key => $value){
                $CarsTitle[$key]=$value->getTitle();
                $CarsTitleTO[$key]=$value->getTitle();
                $CarsDescription[$key]=$value->getCarsDesc();
            }

        }
        return $this->render('luxury_cars/index.html.twig',array('images'=>$images ,'CarsTitle'=>$CarsTitle,
        'CarsTitleTO'=>$CarsTitleTO,'CarsDescription'=>$CarsDescription));
    } 
    
      /**
     * @Route("/luxury_cars/{Resname}", name="luxury_cars_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $Resname,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo6=$em->getRepository(LuxuryCarsFR::class);
        $cars= $repo6->findOneBy(array('title'=>$Resname));
        $repo7=$em->getRepository(LuxuryCars::class);
        $carsEN= $repo7->findOneBy(array('id'=>$cars->getId()));
        $CarId=$carsEN->getId();
        $carsTitle=$cars->getTitle();
        $carsDesc=$cars->getCarsDesc();
    }elseif($lang=='ar'){
        
        $repo7=$em->getRepository(LuxuryCars::class);
        $carsEN= $repo7->findOneBy(array('title'=>$Resname));
        $repo6=$em->getRepository(LuxuryCarsAR::class);
        $cars= $repo6->findOneBy(array('id'=>$carsEN->getId()));
        $CarId=$carsEN->getId();
        $carsTitle=$cars->getTitle();
        $carsDesc=$cars->getCarsDesc();
    }
    else {
        $repo7=$em->getRepository(LuxuryCars::class);
        $carsEN= $repo7->findOneBy(array('title'=>$Resname));
        $carsTitle=$carsEN->getTitle();
        $carsDesc=$carsEN->getCarsDesc();
        $CarId=$carsEN->getId();
    }
        $repo4=$em->getRepository(CarsImages::class);
        $CarsImages=$repo4->findBy(array('CarsId'=> $CarId));
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
          $req->setCarId( $carsEN);
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
      $flashMessage=$translator->trans('Reserved Successfuly');
      $this->addFlash(
          'info',
          $flashMessage
      );
          return $this->RedirectToRoute("app_luxuryCars");
                     }
        return $this->render('luxury_cars/cars.html.twig', [
            'CarsImages' => $CarsImages,'Cars' => $carsEN,
            'form' => $form->createView(),'carsTitle'=>$carsTitle,
            'carsDesc'=>$carsDesc

        ]);
    }
}
