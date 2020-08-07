<?php

namespace App\Controller\Admin;

use App\Entity\TestimonialsFR;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TestimonialsFRCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TestimonialsFR::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Client'),
            TextField::new('ClientPosition'),
            TextEditorField::new('Testimonial'),
        ];
    }
    
}
