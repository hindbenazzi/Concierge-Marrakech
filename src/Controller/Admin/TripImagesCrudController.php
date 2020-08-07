<?php

namespace App\Controller\Admin;

use App\Entity\TripImages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TripImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TripImages::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('TripId')->autocomplete(),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
        ];
    }
    
}
