<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\LuxuryCars;
 use App\Repository\LuxuryCarsRepository;
 use Doctrine\ORM\EntityManagerInterface;

class LuxuryCarsController extends AbstractController
{
    /**
     * @Route("/luxury_cars", name="app_luxuryCars")
     */
    public function luxury_cars(EntityManagerInterface $em)
    {
        $repo3=$em->getRepository(LuxuryCars::class);
        $images= $repo3->findAll();
        foreach($images as $key=>$value){
            $value->setCarsImg(base64_encode(stream_get_contents($value->getCarsImg())));
        }

        return $this->render('luxury_cars/index.html.twig',array('images'=>$images));
    }
}
