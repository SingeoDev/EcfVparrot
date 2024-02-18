<?php

namespace App\Controller\Admin;

use App\Entity\Vehicles;
use App\Form\ImageGalleryType;
use App\Form\OptionsType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehiclesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicles::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            DateField::new('years'),
            IntegerField::new('mileage'),
            IntegerField::new('price'),
            TextField::new('fuel')->setLabel('Énergie')->hideOnIndex(),
            TextField::new('gearbox'),
            TextareaField::new('imageFile')->setFormType(VichImageType::class),
            CollectionField::new('options')->setEntryType(OptionsType::class)->hideOnIndex()->setLabel('options'),
            CollectionField::new('imageGalleries')->setEntryType(ImageGalleryType::class),
        ];
    }
}
