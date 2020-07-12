<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PrivatePalace;
use App\Repository\PrivatePalaceRepository;
use Doctrine\ORM\EntityManagerInterface;

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
}
