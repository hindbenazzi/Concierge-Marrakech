<?php

namespace App\Controller\Admin;

use App\Entity\PrivatePalace;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PrivatePalaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrivatePalace::class;
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
            TextField::new('Price'),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class)
            
        ];
    }
    
}
