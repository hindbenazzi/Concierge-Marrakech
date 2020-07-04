<?php

namespace App\Controller;
use App\Entity\Fields;
use App\Repository\FieldsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\FieldImage;
use App\Repository\FieldImageRepository;

class FieldsController extends AbstractController
{
    /**
     * @Route("/field/{id}", name="fields")
     */
    public function ShowField(Fields $field,EntityManagerInterface $em)
    {
        $repo=$em->getRepository(FieldImage::class);
        $fieldImages=$repo->findBy(array('fields'=>$field->getId()));
        foreach($fieldImages as $key => $value){
            $value->setImage(base64_encode(stream_get_contents($value->getImage())));
        }
        
        $field->setFieldPicture(base64_encode(stream_get_contents($field->getFieldPicture())));
        
        return $this->render('Concierge/field.html.twig',['field'=>$field,'fieldImages'=>$fieldImages]);
    }
}
