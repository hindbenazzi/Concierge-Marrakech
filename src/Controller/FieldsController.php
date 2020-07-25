<?php

namespace App\Controller;
use App\Entity\Fields;
use App\Repository\FieldsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\FieldImages;
use App\Entity\FieldsFR;
use App\Entity\FieldsAR;
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
use App\Entity\ServiceFR;
use App\Entity\ServiceAR;
use App\Repository\RequeteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class FieldsController extends AbstractController
{
    /**
     * @Route("/field/{id}", name="fields")
     */
    public function ShowField(Fields $field,Request $request,EntityManagerInterface $em,$id,\Swift_Mailer $mailer,TranslatorInterface $translator)
    {   
        $repo11=$em->getRepository(Fields::class);
        $fieldeng=$repo11->findBy(array('id'=>$id));
        $repo1=$em->getRepository(Service::class);
        $service=$repo1->findBy(array('fields'=>$id));
        $serviceTitle=array();
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo5=$em->getRepository(FieldsFR::class);
        $fieldfr=$repo5->findOneBy(array('id'=>$field->getId()));
        $fieldName=$fieldfr->getFieldName();
        $fieldContenue=$fieldfr->getContenue();
        $fieldDescription=$fieldfr->getfieldDesc();

        $repo6=$em->getRepository(ServiceFR::class);
        $servicefr=$repo6->findBy(array('fields'=>$id));
        foreach($servicefr as $key => $value){
          $serviceTitle[$key]=$value->getTitle();
        }
        }elseif($lang=='ar'){
          $repo5=$em->getRepository(FieldsAR::class);
          $fieldar=$repo5->findOneBy(array('id'=>$field->getId()));
          $fieldName=$fieldar->getFieldName();
          $fieldContenue=$fieldar->getContenue();
          $fieldDescription=$fieldar->getfieldDesc();
          $repo7=$em->getRepository(ServiceAR::class);
          $servicear=$repo7->findBy(array('fields'=>$id));
          foreach($servicear as $key => $value){
            $serviceTitle[$key]=$value->getTitle();
              
  
          }
        }
        else{
          $repo5=$em->getRepository(Fields::class);
          $field=$repo5->findOneBy(array('id'=>$field->getId()));
          $fieldName=$field->getFieldName();
          $fieldContenue=$field->getContenue();
          $fieldDescription=$field->getfieldDesc();
  
          $repo6=$em->getRepository(Service::class);
          $serviceen=$repo6->findBy(array('fields'=>$id));
          foreach($serviceen as $key => $value){
            $serviceTitle[$key]=$value->getTitle();
          }
        }
        $repo=$em->getRepository(FieldImages::class);
        $fieldImages=$repo->findBy(array('fields'=>$field->getId()));
        $req=new Requete();
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
          $select=$request->request->get('serviceSelected');
          if($select=='Luxury cars'){
            return $this->RedirectToRoute("app_luxuryCars");
          }
          if($lang=='fr'){

            $serviceselectedfr=($repo6->findOneBy(array('title'=>$select)));
            $serviceselected=($repo1->findOneBy(array('id'=>$serviceselectedfr->getId())));
            
            }elseif($lang=='ar'){
              $serviceselectedar=($repo7->findOneBy(array('title'=>$select)));
              $serviceselected=($repo1->findOneBy(array('id'=>$serviceselectedar->getId())));
  
              }
            else{
              $serviceselected=($repo1->findOneBy(array('title'=>$select)));
              
            }
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
      $flashMessage=$translator->trans('Reserved Successfuly');
      $this->addFlash(
          'info',
          $flashMessage
      );
          return $this->RedirectToRoute("app_home");
                     }
        return $this->render('Concierge/field.html.twig',['field'=>$field,
        'fieldImages'=>$fieldImages,'form' => $form->createView(),'services'=>$service,'fieldName'=>$fieldName,
        'fieldContenue'=>$fieldContenue,'fieldDescription'=>$fieldDescription,'serviceTitle'=>$serviceTitle]);
    }
}
