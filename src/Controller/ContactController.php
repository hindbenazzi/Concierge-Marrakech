<?php

namespace App\Controller;

use App\Entity\Partners;
use App\Entity\Reclamation;
use App\Repository\PartnersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(EntityManagerInterface $em,Request $request, \Swift_Mailer $mailer,TranslatorInterface $translator)
    {
        $rec=new Reclamation();
        $repo2=$em->getRepository(Partners::class);
        $Partners=$repo2->findAll();
        $form = $this->createFormBuilder($rec)
        ->add('Name', TextType::class)
        ->add('Phone', TextType::class)
        ->add('Email', TextType::class)
        ->add('Topic', TextType::class)
        ->add('Message', TextareaType::class)
        ->add('Send_Request', SubmitType::class)
        ->getForm();
$form->handleRequest($request);
if ($form->isSubmitted() && $form->isValid()) {
    $em->persist($rec);
    $em->flush();
    $message = (new \Swift_Message('Emaile de Reclamation/Demande d\'information '))
    ->setFrom('hindouxa.hida@gmail.com')
    ->setTo('hindb788@gmail.com')
    ->setBody( $this->renderView(
      'contact/email.txt.twig',
      ['Name' => $rec->getName(),'Phone' => $rec->getPhone(),'Email' => $rec->getEmail()
      ,'Message' => $rec->getMessage(),'Topic'=>$rec->getTopic(),
      ]
  )
    )
;
$mailer->send($message);
$flashMessage=$translator->trans('Your message has been sent');
$this->addFlash(
    'info',
    $flashMessage
);
    return $this->RedirectToRoute("app_contact");
               }
        return $this->render('contact/index.html.twig', [
            'Partners' => $Partners,'form' => $form->createView()
        ]);
    
    }
}
