<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Fields;
use App\Repository\FieldsRepository;
use App\Entity\Testimonials;
use App\Repository\TestimonialsRepository;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(EntityManagerInterface $em)
    {
        
        $repo=$em->getRepository(Fields::class);
        $fields=$repo->findAll();
        foreach($fields as $key => $value){
            $value->setFieldPicture(base64_encode(stream_get_contents($value->getFieldPicture())));
        }
        $repo1=$em->getRepository(Testimonials::class);
        $testimonials=$repo1->findAll();
        return $this->render('Concierge/index.html.twig',['fields'=>$fields,'testimonials'=>$testimonials]);
    }
}
