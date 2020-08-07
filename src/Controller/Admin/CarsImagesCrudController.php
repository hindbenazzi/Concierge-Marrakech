<?php

namespace App\Controller\Admin;

use App\Entity\CarsImages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CarsImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarsImages::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('CarsId')->autocomplete(),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
        ];
    }
    
}
