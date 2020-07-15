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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;

class PrivatePalaceController extends AbstractController
{
    /**
     * @Route("/private_palace", name="app_privatepalace")
     */
    public function Private_palace(EntityManagerInterface $em)
    {
        $repo4=$em->getRepository(PrivatePalace::class);
        $photos= $repo4->findAll();
        foreach($photos as $key=>$value){
            $value->setPhoto(base64_encode(stream_get_contents($value->getPhoto())));
        }

        return $this->render('private_palace/index.html.twig',array('photos'=>$photos));
    }
      /**
     * @Route("/private_palace/{Resname}", name="private_palace_details")
     */
    public function ShowDetails(EntityManagerInterface $em, $Resname,Request $request)
    {
        
        $repo1=$em->getRepository(PrivatePalace::class);
        $palace= $repo1->findOneBy(array('Title'=>$Resname));
        $PalId=$palace->getId();
        $repo2=$em->getRepository(PalaceImages::class);
        $PalaceImages=$repo2->findBy(array('PalaceId'=> $PalId));
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
          $req->setPalaceId( $palace);
          $em->persist($req);
          $em->flush();
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('private_palace/palace.html.twig', [
            'PalaceImages' => $PalaceImages,'Palace' => $palace,
            'form' => $form->createView()
        ]);
    }
}
