<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Fields;
use App\Entity\FieldsFR;
use App\Repository\FieldsRepository;
use App\Entity\Testimonials;
use App\Repository\TestimonialsRepository;
use App\Entity\Partners;
use App\Entity\TestimonialsFR;
use App\Repository\PartnersRepository;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(EntityManagerInterface $em,Request $request)
    {

        $repo=$em->getRepository(Fields::class);
        $fields=$repo->findAll();
        $repo1=$em->getRepository(Testimonials::class);
        $testimonials=$repo1->findAll();
        $repo2=$em->getRepository(Partners::class);
        $Partners=$repo2->findAll();
        foreach($Partners as $key => $value){
            $value->setPartnerImage(base64_encode(stream_get_contents($value->getPartnerImage())));
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo3=$em->getRepository(FieldsFR::class);
        $fieldsfr=$repo3->findAll();
        $repo4=$em->getRepository(TestimonialsFR::class);
        $testimonialsFR=$repo4->findAll();
        foreach($fields as $key => $value){
            $value->setFieldName($fieldsfr[$key]->getFieldName());
            $value->setContenue($fieldsfr[$key]->getContenue());
            $value->setfieldDesc($fieldsfr[$key]->getfieldDesc());

        }
        foreach($testimonials as $key => $value){
            $value->setClient($testimonialsFR[$key]->getClient());
            $value->setClientPosition($testimonialsFR[$key]->getClientPosition());
            $value->setTestimonial($testimonialsFR[$key]->getTestimonial());

        }
        }else{
            
        }
        return $this->render('Concierge/index.html.twig',
        ['fields'=>$fields,'testimonials'=>$testimonials,'Partners'=>$Partners]);
    }
     /**
     * @Route("/partner/{id}", name="app_PartnerWeb")
     */
    public function redirectToPartner(EntityManagerInterface $em, Partners $partner)
    {
        $website='https://'.($partner->getWebsite());
        return $this->redirect($website);
    }

}
