<?php

namespace App\Controller\Admin;

use App\Entity\Partners;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PartnersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partners::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('PartnerName'),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
            
        ];
    }
    
}
