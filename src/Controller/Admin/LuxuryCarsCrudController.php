<?php

namespace App\Controller\Admin;

use App\Entity\LuxuryCars;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LuxuryCarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LuxuryCars::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('CarsDesc'),
            MoneyField::new('Price')->setCurrency('MAD'),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class)
        ];
    }
    
}
