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
use App\Entity\PrivatePalaceAR;
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
        $PalaceTo=array();
        $PalaceTitle=array();
        $PalaceArea=array();
        $PalaceNbrPieces=array();
        $PalaceChars=array();
        $PalaceAdress=array();
        foreach($photos as $key => $value){
            $PalaceTo[$key]=$value->getTitle();
        }
        foreach($photos as $key=>$value){
            $value->setPhoto(base64_encode(stream_get_contents($value->getPhoto())));
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo5=$em->getRepository(PrivatePalaceFR::class);
        $photosFR= $repo5->findAll();
        foreach($photosFR as $key=>$value){
        $PalaceTitle[$key]=$value->getTitle();
        $PalaceArea[$key]=$value->getArea();
        $PalaceNbrPieces[$key]=$value->getNumberOfPieces();
        $PalaceChars[$key]=$value->getOtherCharacteristics();
        $PalaceAdress[$key]=$value->getAddress();

        }
        foreach($photosFR as $key => $value){
            $PalaceTo[$key]=$value->getTitle();
        }

        }elseif($lang=='ar'){
            $repo5=$em->getRepository(PrivatePalaceAR::class);
            $photosAR= $repo5->findAll();
            foreach($photosAR as $key=>$value){
             $PalaceTitle[$key]=$value->getTitle();
             $PalaceArea[$key]=$value->getArea();
             $PalaceNbrPieces[$key]=$value->getNumberOfPieces();
             $PalaceChars[$key]=$value->getOtherCharacteristics();
             $PalaceAdress[$key]=$value->getAddress();
    
            }
            $repo6=$em->getRepository(PrivatePalace::class);
            $photos= $repo6->findAll();
            foreach($photos as $key => $value){
                $PalaceTo[$key]=$value->getTitle();
            }
            }
        else{
            $repo5=$em->getRepository(PrivatePalace::class);
            $photos= $repo5->findAll();
            foreach($photos as $key=>$value){
             $PalaceTitle[$key]=$value->getTitle();
             $PalaceArea[$key]=$value->getArea();
             $PalaceNbrPieces[$key]=$value->getNumberOfPieces();
             $PalaceChars[$key]=$value->getOtherCharacteristics();
             $PalaceAdress[$key]=$value->getAddress();
    
            }
            foreach($photos as $key => $value){
                $PalaceTo[$key]=$value->getTitle();
            }

        }
        return $this->render('private_palace/index.html.twig',array('photos'=>$photos ,'PalaceTo'=>$PalaceTo,
        'PalaceTitle'=>$PalaceTitle,'PalaceArea'=>$PalaceArea,'PalaceNbrPieces'=>$PalaceNbrPieces,
        'PalaceChars'=>$PalaceChars,'PalaceAdress'=>$PalaceAdress
               ));
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
            $palaceTitle=$palace->getTitle();
            $palaceArea=$palace->getArea();
            $palaceNbrPiece=$palace->getNumberOfPieces();
            $palaceChars=$palace->getOtherCharacteristics();
            $palaceAdress=$palace->getAddress();
        }elseif($lang=='ar'){
           
            $repo3=$em->getRepository(PrivatePalace::class);
            $palaceEN= $repo3->findOneBy(array('Title'=>$Resname));
            $repo1=$em->getRepository(PrivatePalaceAR::class);
            $palace= $repo1->findOneBy(array('id'=>$palaceEN->getId()));
            $PalId=$palaceEN->getId();
            $palaceTitle=$palace->getTitle();
            $palaceArea=$palace->getArea();
            $palaceNbrPiece=$palace->getNumberOfPieces();
            $palaceChars=$palace->getOtherCharacteristics();
            $palaceAdress=$palace->getAddress();
        }
        else{
            $repo3=$em->getRepository(PrivatePalace::class);
            $palaceEN= $repo3->findOneBy(array('Title'=>$Resname));
            $PalId=$palaceEN->getId();
            $palaceTitle=$palaceEN->getTitle();
            $palaceArea=$palaceEN->getArea();
            $palaceNbrPiece=$palaceEN->getNumberOfPieces();
            $palaceChars=$palaceEN->getOtherCharacteristics();
            $palaceAdress=$palaceEN->getAddress();
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
            'form' => $form->createView(),'palaceTitle'=>$palaceTitle,'palaceArea'=>$palaceArea,
            'palaceNbrPiece'=>$palaceNbrPiece,'palaceChars'=>$palaceChars,'palaceAdress'=>$palaceAdress
        ]);
    }
}
