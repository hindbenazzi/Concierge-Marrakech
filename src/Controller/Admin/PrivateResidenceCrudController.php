<?php

namespace App\Controller\Admin;

use App\Entity\PrivateResidence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PrivateResidenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrivateResidence::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Name'),
            TextEditorField::new('Description'),
            TextEditorField::new('Adress'),
            TextEditorField::new('Facilities'),
            MoneyField::new('Price')->setCurrency('MAD'),
            TextField::new('size'),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
        ];
    }
    
}
