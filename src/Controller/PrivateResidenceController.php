<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PrivateResidence;
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
class PrivateResidenceController extends AbstractController
{
    /**
     * @Route("/private_residence", name="private_residence")
     */
    public function index(EntityManagerInterface $em)
    {
        $repo=$em->getRepository(PrivateResidence::class);
        $Residence= $repo->findAll();
        return $this->render('private_residence/index.html.twig', [
            'Residences' => $Residence,
        ]);
    }
    /**
     * @Route("/private_residence/{Resname}", name="private_residence_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $Resname,Request $request)
    {
        ;
        $repo=$em->getRepository(PrivateResidence::class);
        $Residence= $repo->findOneBy(array('Name'=>$Resname));
        $ResId=$Residence->getId();
        $repo1=$em->getRepository(ResidenceImages::class);
        $ResidenceImages=$repo1->findBy(array('ResidenceId'=>$ResId));
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
          $req->setResidenceId($Residence);
          $em->persist($req);
          $em->flush();
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('private_residence/Residence.html.twig', [
            'ResidencesImages' => $ResidenceImages,'Residence' => $Residence,
            'form' => $form->createView()
        ]);
    }
}
