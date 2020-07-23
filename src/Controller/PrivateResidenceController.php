<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PrivateResidence;
use App\Entity\PrivateResidenceFR;
use App\Entity\RequetePersonalisable;
use App\Entity\RequetePersonalisableRepository;
use App\Repository\PrivateResidenceRepository;
use App\Entity\ResidenceImages;
use App\Repository\ResidenceImagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class PrivateResidenceController extends AbstractController
{
    /**
     * @Route("/private_residence", name="private_residence")
     */
    public function privateResidence(EntityManagerInterface $em ,Request $request)
    {
        $repo=$em->getRepository(PrivateResidence::class);
        $Residence= $repo->findAll();
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo1=$em->getRepository(PrivateResidenceFR::class);
        $ResidenceFR= $repo1->findAll();
        foreach($Residence as $key=>$value){
            $value->setName($ResidenceFR[$key]->getName());
            $value->setDescription($ResidenceFR[$key]->getDescription());
            $value->setFacilities($ResidenceFR[$key]->getFacilities());
            $value->setAdress($ResidenceFR[$key]->getAdress());

        }

        }else{

        }
        return $this->render('private_residence/index.html.twig', [
            'Residences' => $Residence,
        ]);
    }
    /**
     * @Route("/private_residence/{Resname}", name="private_residence_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $Resname,Request $request,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo2=$em->getRepository(PrivateResidenceFR::class);
        $Residence= $repo2->findOneBy(array('Name'=>$Resname));
        $repo=$em->getRepository(PrivateResidence::class);
        $ResidenceEN= $repo->findOneBy(array('id'=>$Residence->getId()));
        $ResId=$ResidenceEN->getId();
        $ResidenceEN->setName($Residence->getName());
        $ResidenceEN->setDescription($Residence->getDescription());
        $ResidenceEN->setFacilities($Residence->getFacilities());
        $ResidenceEN->setAdress($Residence->getAdress());
        }else{
        $repo=$em->getRepository(PrivateResidence::class);
        $ResidenceEN= $repo->findOneBy(array('Title'=>$Resname));
        $ResId=$ResidenceEN->getId();
        }
        $repo1=$em->getRepository(ResidenceImages::class);
        $ResidenceImages=$repo1->findBy(array('ResidenceId'=>$ResId));
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
          $req->setResidenceId($ResidenceEN);
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('hindouxa.hida@gmail.com')
          ->setTo('hindb788@gmail.com')
          ->setBody( $this->renderView(
            'private_residence/email.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail()
            ,'message' => $req->getMessage(),'Residence'=>$req->getResidenceId()->getName(),
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
          return $this->RedirectToRoute("private_residence");
                     }
        return $this->render('private_residence/Residence.html.twig', [
            'ResidencesImages' => $ResidenceImages,'Residence' => $ResidenceEN,
            'form' => $form->createView()
        ]);
    }
}
