<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PartnersRepository;
use App\Entity\Partners;

class AboutUsController extends AbstractController
{
    /**
     * @Route("/about_us", name="app_aboutus")
     */
    public function index(EntityManagerInterface $em)
    {
        $repo7=$em->getRepository(Partners::class);
        $Partners=$repo7->findAll();
        return $this->render('about_us/index.html.twig', [
            'partners'=>$Partners]);
    }
}
