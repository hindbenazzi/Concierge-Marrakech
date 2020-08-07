<?php

namespace App\Controller\Admin;

use App\Entity\VIPTrips;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class VIPTripsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VIPTrips::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('TripName'),
            TextEditorField::new('PackPlanning'),
            TextEditorField::new('TripDescription'),
            TextField::new('Price'),
            ImageField::new('ImageUrlFile')->setFormType(VichImageType::class),
        ];
    }
    
}
