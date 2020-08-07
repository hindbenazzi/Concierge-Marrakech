<?php

namespace App\Controller\Admin;

use App\Entity\PalaceImages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PalaceImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PalaceImages::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('PalaceId')->autocomplete(),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
            
        ];
    }
    
}
