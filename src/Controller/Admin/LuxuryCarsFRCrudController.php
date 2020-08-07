<?php

namespace App\Controller\Admin;

use App\Entity\LuxuryCarsFR;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LuxuryCarsFRCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LuxuryCarsFR::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('CarsDesc'),
        ];
    }
    
}
