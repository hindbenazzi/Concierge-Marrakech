<?php

namespace App\Controller\Admin;

use App\Entity\ConciergeServiceFR;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ConciergeServiceFRCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ConciergeServiceFR::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
   
}
