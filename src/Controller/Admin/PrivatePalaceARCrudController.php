<?php

namespace App\Controller\Admin;

use App\Entity\PrivatePalaceAR;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrivatePalaceARCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrivatePalaceAR::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Title'),
            TextField::new('Area'),
            TextEditorField::new('NumberOfPieces'),
            TextEditorField::new('OtherCharacteristics'),
            TextEditorField::new('Address'),
        ];
    }
    
}
