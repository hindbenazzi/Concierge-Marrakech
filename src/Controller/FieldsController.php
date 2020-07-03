<?php

namespace App\Controller;
use App\Entity\Fields;
use App\Repository\FieldsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FieldsController extends AbstractController
{
    /**
     * @Route("/field/{id}", name="fields")
     */
    public function ShowField(Fields $field)
    {

        
            $field->setFieldPicture(base64_encode(stream_get_contents($field->getFieldPicture())));
        
        return $this->render('Concierge/field.html.twig',compact('field'));
    }
}
