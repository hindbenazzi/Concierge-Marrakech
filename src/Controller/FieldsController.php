<?php

namespace App\Controller;
use App\Entity\Fields;
use App\Repository\FieldsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\FieldImages;
use App\Repository\FieldImageRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Service;
use App\Repository\ServiceRepository;
use App\Entity\Requete;
use App\Repository\RequeteRepository;
use Symfony\Component\HttpFoundation\Request;


class FieldsController extends AbstractController
{
    /**
     * @Route("/field/{id}", name="fields")
     */
    public function ShowField(Fields $field,Request $request,EntityManagerInterface $em,$id,\Swift_Mailer $mailer)
    {
        $repo=$em->getRepository(FieldImages::class);
        $fieldImages=$repo->findBy(array('fields'=>$field->getId()));
        $req=new Requete();
        $repo1=$em->getRepository(Service::class);
        $service=$repo1->findBy(array('fields'=>$id));
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
          $select=$request->request->get('serviceSelected');
          if($select=='Luxury cars'){
            return $this->RedirectToRoute("app_luxuryCars");
          }
          $serviceselected=($repo1->findOneBy(array('title'=>$select)));
          $req->setService($serviceselected);
          $em->persist($req);
          $em->flush();
          $message = (new \Swift_Message('Emaile de Reservation '))
          ->setFrom('hindouxa.hida@gmail.com')
          ->setTo('hindb788@gmail.com')
          ->setBody( $this->renderView(
            'Concierge/email.txt.twig',
            ['FullName' => $req->getFullName(),'Telephone' => $req->getTelephone(),'Email' => $req->getEmail()
            ,'message' => $req->getMessage(),'Service'=>$req->getService()->getTitle(),
            'Du'=>date_format($req->getStartingON(),"Y/m/d H:i:s"),'until'=>date_format($req->getFinishingON(),"Y/m/d H:i:s")]
        )
          )
      ;
      $mailer->send($message);
           $this->addFlash(
               'info',
               'Reserved Successfuly'
           );
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('Concierge/field.html.twig',['field'=>$field,
        'fieldImages'=>$fieldImages,'form' => $form->createView(),'services'=>$service]);
    }
}
