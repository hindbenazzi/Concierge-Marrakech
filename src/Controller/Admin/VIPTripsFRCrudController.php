<?php

namespace App\Controller\Admin;

use App\Entity\VIPTripsFR;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VIPTripsFRCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VIPTripsFR::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('TripName'),
            TextEditorField::new('PackPlanning'),
            TextEditorField::new('TripDescription'),
        ];
    }
    
}
