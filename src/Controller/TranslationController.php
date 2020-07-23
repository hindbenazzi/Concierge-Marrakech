<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TranslationController extends AbstractController
{
    /**
     * @Route("/translation/{locale}", name="translation")
     */
    public function TranslateTo($locale,Request $request)
    {
        
        $request->getSession()->set('_locale',$locale);
        
        return $this->redirect($request->headers->get('referer'));
        
    }
}
