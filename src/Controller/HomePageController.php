<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Fields;
use App\Entity\FieldsFR;
use App\Entity\FieldsAR;
use App\Repository\FieldsRepository;
use App\Entity\Testimonials;
use App\Repository\TestimonialsRepository;
use App\Entity\Partners;
use App\Entity\TestimonialsFR;
use App\Entity\TestimonialsAR;
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
        $fieldName=array();
        $fieldContenue=array();
        $fieldDescription=array();
        $testClient=array();
        $testClientPos=array();
        $testTest=array();
        foreach($Partners as $key => $value){
            $value->setPartnerImage(base64_encode(stream_get_contents($value->getPartnerImage())));
        }
        $lang=$request->getSession()->get('_locale');
        if($lang=='fr'){
        $repo3=$em->getRepository(FieldsFR::class);
        $fieldsfr=$repo3->findAll();
        $repo4=$em->getRepository(TestimonialsFR::class);
        $testimonialsFR=$repo4->findAll();
        foreach($fieldsfr as $key => $value){
        $fieldName[$key]=$value->getFieldName();
        $fieldContenue[$key]=$value->getContenue();
        $fieldDescription[$key]=$value->getfieldDesc();

        }
        foreach($testimonialsFR as $key => $value){
        $testClient[$key]=$value->getClient();
        $testClientPos[$key]=$value->getClientPosition();
        $testTest[$key]=$value->getTestimonial();

        }
        
        }
        elseif($lang=='ar'){
            $repo3=$em->getRepository(FieldsAR::class);
            $fieldsar=$repo3->findAll();
            $repo4=$em->getRepository(TestimonialsAR::class);
            $testimonialsAR=$repo4->findAll();
            foreach($fieldsar as $key => $value){
                $fieldName[$key]=$value->getFieldName();
                $fieldContenue[$key]=$value->getContenue();
                $fieldDescription[$key]=$value->getfieldDesc();
        
                }
                foreach($testimonialsAR as $key => $value){
                $testClient[$key]=$value->getClient();
                $testClientPos[$key]=$value->getClientPosition();
                $testTest[$key]=$value->getTestimonial();
        
                }
            }
        else{
        $repo5=$em->getRepository(Fields::class);
        $fieldsen=$repo5->findAll();
        $repo6=$em->getRepository(Testimonials::class);
        $testimonialsen=$repo6->findAll();
        $repo7=$em->getRepository(Partners::class);
        $Partners=$repo7->findAll();
        foreach($fieldsen as $key => $value){
            $fieldName[$key]=$value->getFieldName();
            $fieldContenue[$key]=$value->getContenue();
            $fieldDescription[$key]=$value->getfieldDesc();
    
            }
            foreach($testimonialsen as $key => $value){
            $testClient[$key]=$value->getClient();
            $testClientPos[$key]=$value->getClientPosition();
            $testTest[$key]=$value->getTestimonial();
    
            }
        
        }
        return $this->render('Concierge/index.html.twig',
        ['fields'=>$fields,'testimonials'=>$testimonials,'Partners'=>$Partners,'fieldName'=>$fieldName,
        'fieldContenue'=>$fieldContenue,'fieldDescription'=>$fieldDescription,
        'testClient'=>$testClient,'testClientPos'=>$testClientPos,'testTest'=>$testClientPos]);
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
