<?php

namespace App\Controller;
use App\Entity\Fields;
use App\Repository\FieldsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\FieldImage;
use App\Repository\FieldImageRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
    public function ShowField(Fields $field,Request $request,EntityManagerInterface $em,$id)
    {
        $repo=$em->getRepository(FieldImage::class);
        $fieldImages=$repo->findBy(array('fields'=>$field->getId()));
        foreach($fieldImages as $key => $value){
            $value->setImage(base64_encode(stream_get_contents($value->getImage())));
        }
        
        $field->setFieldPicture(base64_encode(stream_get_contents($field->getFieldPicture())));
        
        $req=new Requete();
        $repo=$em->getRepository(Service::class);
        $service=$repo->findBy(array('Field'=>$id));
        $form = $this->createFormBuilder($req)
                     ->add('Full_Name', TextType::class)
                     ->add('Telephone', TextType::class)
                     ->add('Email', TextType::class)
                     ->add('message', TextareaType::class)
                     ->add('Send_Request', SubmitType::class)
                     ->getForm();
         $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $serviceselected=($repo->findOneBy(array('Title'=>$request->request->get('serviceSelected'))));
          $req->setService($serviceselected);
          $repo1=$em->getRepository(Fields::class);
          $field=$repo1->findOneBy(array('id'=>$id));
          dd($req);
          
          $em->persist($req);
          $em->flush();
                     }
        return $this->render('Concierge/field.html.twig',['field'=>$field,
        'fieldImages'=>$fieldImages,'form' => $form->createView(),'services'=>$service]);
    }
}
