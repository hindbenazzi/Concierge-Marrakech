<?php

namespace App\Controller\Admin;

use App\Entity\ResidenceImages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ResidenceImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ResidenceImages::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('ResidenceId')->autocomplete(),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
        ];
    }
    
}
