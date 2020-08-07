<?php

namespace App\Controller\Admin;

use App\Entity\PrivateResidenceAR;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrivateResidenceARCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrivateResidenceAR::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Name'),
            TextEditorField::new('Description'),
            TextEditorField::new('Adress'),
            TextEditorField::new('Facilities'),
        ];
    }
    
}
