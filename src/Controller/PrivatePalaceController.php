<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PrivatePalace;
use App\Entity\RequetePersonalisable;
use App\Entity\RequetePersonalisableRepository;
use App\Repository\PrivatePalaceRepository;
use App\Repository\PalaceImagesRepository;
use App\Entity\PalaceImages;
use App\Entity\PrivatePalaceFR;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class PrivatePalaceController extends AbstractController
{
    /**
     * @Route("/private_palace", name="app_privatepalace")
     */
    public function Private_palace(EntityManagerInterface $em,Request $request)
    {
        $repo4=$em->getRepository(PrivatePalace::class);
        $photos= $repo4->findAll();
        foreach($photos as $key=>$value){
            $value->setPhoto(base64_encode(stream_get_contents($value->getPhoto())));
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo5=$em->getRepository(PrivatePalaceFR::class);
        $photosFR= $repo5->findAll();
        foreach($photos as $key=>$value){
            $value->setTitle($photosFR[$key]->getTitle());
            $value->setArea($photosFR[$key]->getArea());
            $value->setNumberOfPieces($photosFR[$key]->getNumberOfPieces());
            $value->setOtherCharacteristics($photosFR[$key]->getOtherCharacteristics());
            $value->setAddress($photosFR[$key]->getAddress());

        }

        }else{

        }
        return $this->render('private_palace/index.html.twig',array('photos'=>$photos));
    }
      /**
     * @Route("/private_palace/{Resname}", name="private_palace_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $Resname,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {    


        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
            $repo1=$em->getRepository(PrivatePalaceFR::class);
            $palace= $repo1->findOneBy(array('Title'=>$Resname));
            $repo3=$em->getRepository(PrivatePalace::class);
            $palaceEN= $repo3->findOneBy(array('id'=>$palace->getId()));
            $PalId=$palaceEN->getId();
            $palaceEN->setTitle($palace->getTitle());
            $palaceEN->setArea($palace->getArea());
            $palaceEN->setNumberOfPieces($palace->getNumberOfPieces());
            $palaceEN->setOtherCharacteristics($palace->getOtherCharacteristics());
            $palaceEN->setAddress($palace->getAddress());
        }else{
            $repo3=$em->getRepository(PrivatePalace::class);
            $palaceEN= $repo3->findOneBy(array('Title'=>$Resname));
            $PalId=$palaceEN->getId();
        }
        $repo2=$em->getRepository(PalaceImages::class);
        $PalaceImages=$repo2->findBy(array('PalaceId'=> $PalId));
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
          $req->setPalaceId( $palaceEN);
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('hindouxa.hida@gmail.com')
          ->setTo('hindb788@gmail.com')
          ->setBody( $this->renderView(
            'private_palace/email.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail()
            ,'message' => $req->getMessage(),'Palace'=>$req->getPalaceId()->getTitle(),
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
          return $this->RedirectToRoute("app_privatepalace");
                     }
        return $this->render('private_palace/palace.html.twig', [
            'PalaceImages' => $PalaceImages,'Palace' => $palaceEN,
            'form' => $form->createView()
        ]);
    }
}
