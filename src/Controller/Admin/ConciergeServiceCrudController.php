<?php

namespace App\Controller\Admin;

use App\Entity\ConciergeService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ConciergeServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ConciergeService::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title'),
            TextEditorField::new('description'),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class)
        ];
    }
    
}
